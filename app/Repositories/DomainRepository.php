<?php

namespace App\Repositories;

use App\Models\Domain;
use App\Repositories\BaseRepository;

/**
 * Class DomainRepository
 * @package App\Repositories
 * @version March 20, 2019, 2:36 pm +0330
*/

class DomainRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'url',
        'username'
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
        return Domain::class;
    }
}
