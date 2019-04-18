<?php

namespace App\Repositories;

use App\Models\Connection;
use App\Repositories\BaseRepository;

/**
 * Class ConnectionRepository
 * @package App\Repositories
 * @version March 30, 2019, 1:28 pm +0430
*/

class ConnectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'username',
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
        return Connection::class;
    }
}
