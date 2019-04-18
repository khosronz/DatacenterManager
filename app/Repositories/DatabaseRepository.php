<?php

namespace App\Repositories;

use App\Models\Database;
use App\Repositories\BaseRepository;

/**
 * Class DatabaseRepository
 * @package App\Repositories
 * @version March 30, 2019, 2:20 pm +0430
*/

class DatabaseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'username',
        'status',
        'port'
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
        return Database::class;
    }
}
