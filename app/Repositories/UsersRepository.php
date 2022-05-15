<?php

namespace App\Repositories;

use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @version May 10, 2021, 12:20 pm JST
 */
class UsersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'status',
        'role_id',
        'deleted_at',
        'birth_day',
        'auth_type',
        'username'
    ];

    protected $fieldInList = [
        'id',
        'full_name',
        'email',
        'status',
        'is_first_login',
        'employee_birthday_checker',
        'employee_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'auth_type',
        'username'
    ];

    protected $fieldFilter = [
        'company_name',
    ];

    protected $fieldOrder = [
        'created_at',
        'updated_at',
        'id',
    ];

    protected $fieldConvert = [
        'id' => 'value',
        'email' => 'text',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    public function create($input)
    {
        $input['password'] = Hash::make($input['password']);

        return parent::create($input);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($input, $id)
    {
        if (isset($input['password']) && $input['password'] != "") {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }
        return parent::update($input, $id);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }

    public function filterName($value)
    {
        $content = $this->processSearch($value);
        $this->query->where('name', 'like', "%$content%");
    }

    public function filterEmail($value)
    {
        $content = $this->processSearch($value);
        $this->query->where('email', 'like', "%$content%");
    }
    public function beforeAllQuery()
    {
        $this->query->with(['userInfo','applications' => function ($query) {
            $query->withCount('applicationDetails');
        }]);
    }
}
