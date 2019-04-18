<?php

namespace App\Repositories;

use App\Models\Databasetype;
use App\Repositories\BaseRepository;

/**
 * Class DatabasetypeRepository
 * @package App\Repositories
 * @version March 20, 2019, 3:33 pm +0330
*/

class DatabasetypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'standard_port'
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
        return Databasetype::class;
    }
}
