<?php

namespace App\Repositories;

use App\Models\Vm;
use App\Repositories\BaseRepository;

/**
 * Class VmRepository
 * @package App\Repositories
 * @version March 30, 2019, 12:07 pm +0430
*/

class VmRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'username',
        'ip'
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
        return Vm::class;
    }
}
