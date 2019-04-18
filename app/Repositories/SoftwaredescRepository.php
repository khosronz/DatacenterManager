<?php

namespace App\Repositories;

use App\Models\Softwaredesc;
use App\Repositories\BaseRepository;

/**
 * Class SoftwaredescRepository
 * @package App\Repositories
 * @version March 30, 2019, 10:27 am +0430
*/

class SoftwaredescRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status',
        'desc_date'
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
        return Softwaredesc::class;
    }
}
