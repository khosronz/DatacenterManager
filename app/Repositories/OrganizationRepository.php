<?php

namespace App\Repositories;

use App\Models\Organization;
use App\Repositories\BaseRepository;

/**
 * Class OrganizationRepository
 * @package App\Repositories
 * @version March 19, 2019, 10:49 am +0330
*/

class OrganizationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status',
        'desc'
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
        return Organization::class;
    }
}
