<?php

namespace App\Repositories;

use App\Http\Utils\AppUtils;
use App\Http\Utils\CommonUtils;
use Carbon\Carbon;
use DB;
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


abstract class BaseRepository
{
    /**
     * @var Model|Builder
     */
    protected $model;

    /**
     * @var Application
     */
    protected $app;

    protected $query;

    protected $fields;
    protected $conditions;
    protected $values;

    /**
     * @param Application $app
     *
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Get searchable fields array
     *
     * @return array
     */
    abstract public function getFieldsSearchable();

    /**
     * @var List field filter
     */
    protected $fieldFilter = [];

    /**
     * @var List field show in query list
     */
    protected $fieldInList = [];

    protected $fieldInDetail = [];

    /**
     * @var List field order
     */
    protected $fieldOrder = [];


    protected $fieldConvert = [];

    public $field_temp = [];

    public $value_temp = [];

    /**
     * Configure the Model
     *
     * @return string
     */
    abstract public function model();

    /**
     * Make Model instance
     *
     * @return Model
     * @throws \Exception
     *
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    private function exitsProperty($name)
    {
        return Schema::hasColumn($this->model->getTable(), $name);
    }

    /**
     * Paginate records for scaffold.
     *
     * @param array $search
     * @param int $perPage
     * @param array $columns
     * @param array $orders
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($search, $perPage, $columns = ['*'], $orders = [])
    {
        if ($columns == null) {
            if (!empty($this->fieldInList)) {
                $columns = $this->fieldInList;
            } else $columns = ['*'];
        }

        if (method_exists($this, 'filterSubTable')) {
            $filter_sub = $this->filterSubTable($this->fields, $this->conditions, $this->values);
            $search = array_merge($search, $filter_sub);
        }

        $this->allQuery($search, null, null, $orders);

        if (method_exists($this, 'beforeAllQuery')) {
            $this->beforeAllQuery($this->fields, $this->conditions, $this->values);
        }

        if (!empty($this->fields)) {
            $this->filterSearch($this->fields, $this->conditions, $this->values);
        }

        return $this->query->paginate($perPage, $columns);
    }

    /**
     * Build a query for retrieving all records.
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function allQuery($search = [], $skip = null, $limit = null, $orders = [])
    {
        $this->query = $this->model->newQuery();

        if (count($search)) {
            foreach ($search as $key => $value) {
                if (in_array($key, $this->getFieldsSearchable())) {
                    $method = 'filter' . Str::studly($key);
                    if (method_exists($this, $method)) {
                        $this->{$method}($value);
                    } else if (method_exists($this->model, $method)) {
                        $this->query = $this->model->{$method}($this->query, $value);
                    } else {
                        $this->query->where($key, $value);
                    }
                } else if ($key == "filter") {
                    if (method_exists($this, 'filter')) {
                        $this->filter($value);
                    } else if (count($this->fieldFilter)) {
                        $value = $this->processSearch($value);
                        $this->query->where(function ($query) use ($value) {
                            foreach ($this->fieldFilter as $field) {
                                $query->orWhere($field, 'like', "%$value%");
                            }
                        });
                    }
                }
            }
        }

        if (is_array($orders) and count($orders)) {
            foreach ($orders as $orderBy => $orderDir) {
                $orderBy = (in_array($orderBy, $this->fieldOrder)) ? $orderBy : $this->fieldOrder[0];
                $this->query->orderBy($orderBy, $orderDir);
            }
        }

        if (!is_null($limit)) {
            $this->query->limit($limit);

            if (!is_null($skip)) {
                $this->query->skip($skip);
            }
        }

        return $this->query;
    }

    /**
     * Retrieve all records with given filter criteria
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @param array $columns
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($search = [], $skip = null, $limit = null, $columns = null, $orders = [])
    {
        if ($columns == null) {
            if (!empty($this->fieldInList)) {
                $columns = $this->fieldInList;
            } else $columns = ['*'];
        }

        $this->handleFilter($search);

        if (method_exists($this, 'filterSubTable')) {
            $filter_sub = $this->filterSubTable($this->fields, $this->conditions, $this->values);
            $search = array_merge($search, $filter_sub);
        }

        $this->allQuery($search, $skip, $limit, $orders);

        if (method_exists($this, 'beforeAllQuery')) {
            $this->beforeAllQuery();
        }

        if (!empty($this->fields)) {
            $this->filterSearch($this->fields, $this->conditions, $this->values);
        }

        return $this->query->get($columns);
    }


    public function allSelect($search = [], $skip = null, $limit = null, $columns = null, $orders = [])
    {
        logger_debug('search_base', __METHOD__, __LINE__, $search);
        $this->handleFilter($search);

        $this->allQuery($search, $skip, $limit, $orders);

        if (!empty($this->fields)) {
            $this->filterSearch($this->fields, $this->conditions, $this->values);
        }

        return $this->query->get($columns);
    }

    /**
     * Create model record
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $user = \Auth::user();


        $model = $this->model->newInstance($input);

        // set created_by
        if (\Auth::check() and $this->exitsProperty('created_by')) {
            $model->created_by = $user->employee_id;
        }

        if (\Auth::check() and $this->exitsProperty('created_at')) {
            $model->created_at = Carbon::now();
        }

        // set modified_by
        if (\Auth::check() and $this->exitsProperty('updated_by')) {
            $model->updated_by = null;
        }

        if (\Auth::check() and $this->exitsProperty('updated_at')) {
            $model->updated_at = Carbon::now();
        }

        // auto generate alias from name or title
        if ($this->exitsProperty('alias') and !$model->alias) {
            if ($this->exitsProperty('name')) {
                $model->alias = CommonUtils::makeAlias($model->name);
            } else if ($this->exitsProperty('title')) {
                $model->alias = CommonUtils::makeAlias($model->title);
            }
        }

        // trigger beforeCreate
        if (method_exists($this, 'beforeCreate')) {
            $this->beforeCreate($model, $input);
        }

        $model->save();

        // trigger afterCreate
        if (method_exists($this, 'afterCreate')) {
            $this->afterCreate($model, $input);
        }

        return $model;
    }

    /**
     * Find model record for given id
     *
     * @param int $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function find($id, $columns = ['*'], $runBefore = true)
    {
        $this->query = $this->model->newQuery();

        if ($runBefore) {
            $this->beforeFind();
        }

        if ($columns == null) {
            $columns = ['*'];
        }

        return $this->query->find($id, $columns);
    }

    /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $user = \Auth::user();
        $this->query = $this->model->newQuery();

        $model = $this->query->findOrFail($id);

        // update, remove id
        if (isset($input['id'])) unset($input['id']);

        // not allow set created_by, modified_by
        if (isset($input['created_by'])) unset($input['created_by']);
        if (isset($input['updated_by'])) unset($input['updated_by']);

        $model->fill($input);

        // set created_by
        if (\Auth::check() and $this->exitsProperty('created_by') and !$model->created_by) {
            $model->created_by = $user->employee_id;
        }

        // set modified_by
        if (\Auth::check() and $this->exitsProperty('updated_by')) {
            $model->updated_by = $user->employee_id;
        }

        if (\Auth::check() and $this->exitsProperty('updated_at')) {
            $model->updated_at = Carbon::now();
        }

        if ($this->exitsProperty('alias') and !$model->alias) {
            if (isset($model->name)) {
                $model->alias = CommonUtils::makeAlias($model->name);
            } else if ($this->exitsProperty('title')) {
                $model->alias = CommonUtils::makeAlias($model->title);
            }
        }

        // trigger beforeUpdate
        if (method_exists($this, 'beforeUpdate')) {
            $this->beforeUpdate($model, $input);
        }

        $model->save();

        // trigger afterUpdate
        if (method_exists($this, 'afterUpdate')) {
            $this->afterUpdate($model, $input);
        }

        return $model;
    }

    /**
     * @param int $id
     *
     * @return bool|mixed|null
     * @throws \Exception
     *
     */
    public function delete($id)
    {
        $user = \Auth::user();
        $this->query = $this->model->newQuery();

        $model = $this->query->findOrFail($id);

        // set deleted_by
        if (\Auth::check() and $this->exitsProperty('deleted_by')) {
            $model->deleted_by = $user->employee_id;
        }
        $model->save();
        // trigger beforeDelete
        if (method_exists($this, 'beforeDelete')) {
            $this->beforeDelete($model);
        }

        $result = $model->delete();

        // trigger afterDelete
        if (method_exists($this, 'afterDelete')) {
            $this->afterDelete($model);
        }
        return $result;
    }

    public function getFirst($searchs = [], $orders = [])
    {
        $query = $this->model->newQuery();

        if (count($searchs)) {
            foreach ($searchs as $key => $value) {
                $method = 'filter' . Str::studly($key);
                if (method_exists($this, $method)) {
                    $this->{$method}($value);
                } else if (method_exists($this->model, $method)) {
                    $query = $this->model->{$method}($query, $value);
                } else {
                    $query->where($key, $value);
                }
            }
        }

        if (is_array($orders) and count($orders)) {
            foreach ($orders as $orderBy => $orderDir) {
                $query->orderBy($orderBy, $orderDir);
            }
        }

        return $query->first();
    }

    public function getSum($field_sum = 'number', $field_where = 'user_id', $field_value = null)
    {
        $query = $this->model->newQuery();
        if ($field_where and $field_value) {
            return $query->where($field_where, $field_value)->sum($field_sum);
        }
        return $query->sum($field_sum);
    }

    public function getCount($search)
    {
        $query = $this->allQuery($search);

        return $query->count();
    }

    public function processSearch($input_search = "")
    {
        return addcslashes($input_search, '!@#$%^&*\()_-+');
    }


    /**
     * @param array $rows
     * @param array $columns
     *
     * @return void
     */
    function insertOrUpdate(array $rows, array $columns): void
    {
        if (count($rows)) {
            $this->model->upsert($rows, $columns);
        }
    }


    public function filterName($value)
    {
        $this->query->where('name', 'like', "%$value%");
    }

    /**
     * @params string $column: column to select, only one column to distinct
     */
    public function getSuggestUniq($search = [], $orders = [], $limit = null, $column = 'id')
    {
        $this->allQuery($search, null, $limit, $orders);
        return $this->query->distinct()->get(\DB::raw($column));
    }

    public function beforeAllQuery()
    {

    }

    public function beforeFind()
    {

    }

    public function beforeCreate($model, $input)
    {
    }

    public function afterCreate($model, $input)
    {
    }

    public function beforeUpdate($model, $input)
    {
    }

    public function afterUpdate($model, $input)
    {
    }

    public function beforeDelete($model)
    {
    }

    public function afterDelete($model)
    {
    }

    /**
     * Save array data
     */
    public function saveMany($index)
    {
        $model = '';
        DB::beginTransaction();
        try {
            foreach ($index as $item) {
                $isDelete = (isset($item['isDeleted']) and $item['isDeleted'] == true) ? true : false;
                $hasID = isset($item['id']) and $item['id'];

                unset($item['isNew']);
                unset($item['isDeleted']);

                if ($isDelete and $hasID) { //delte
                    $model = $this->delete($item['id']);
                } else if ($hasID) {
                    $model = $this->update($item, $item['id']);
                } else {
                    $model = $this->create($item);
                }
            }
            DB::commit();
            return $model;
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function deleteMany($index)
    {
        $model = '';
        DB::beginTransaction();
        try {
            foreach ($index as $id) {
                $model = $this->delete($id);
            }
            DB::commit();
            return $model;
        } catch (\Exception $e) {
            logger_error($e->getMessage());
            DB::rollback();
            return $e->getMessage();
        }
    }
}
