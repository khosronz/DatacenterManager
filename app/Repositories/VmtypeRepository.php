<?php

namespace App\Repositories;

use App\Models\Vmtype;
use App\Repositories\BaseRepository;

/**
 * Class VmtypeRepository
 * @package App\Repositories
 * @version March 20, 2019, 5:07 pm +0330
*/

class VmtypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status'
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
        return Vmtype::class;
    }
}
