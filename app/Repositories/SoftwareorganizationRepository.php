<?php

namespace App\Repositories;

use App\Models\Softwareorganization;
use App\Repositories\BaseRepository;

/**
 * Class SoftwareorganizationRepository
 * @package App\Repositories
 * @version March 30, 2019, 3:50 pm +0430
*/

class SoftwareorganizationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'relation_type'
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
        return Softwareorganization::class;
    }
}
