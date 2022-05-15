<?php

namespace App\Repositories;

use App\Models\Example;
use DB;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @version May 10, 2021, 12:20 pm JST
 */
class ExampleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'status'
    ];

    protected $fieldInList = [
        'id',
        'name',
        'email',
        'status'
    ];

    protected $fieldFilter = [
        'name', 'email'
    ];

    protected $fieldOrder = [
        'created_at',
        'updated_at',
        'id',
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
        return Example::class;
    }
}
