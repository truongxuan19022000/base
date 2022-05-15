<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserInfo;
use DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @version May 10, 2021, 12:20 pm JST
 */
class UsersInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    protected $fieldInList = [

    ];

    protected $fieldFilter = [

    ];

    protected $fieldOrder = [

    ];

    protected $fieldConvert = [

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
        return UserInfo::class;
    }

    public function create($input)
    {
        return parent::create($input);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($input, $id)
    {
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
}
