<?php

namespace App\Repositories;

use App\Models\Software;
use App\Repositories\BaseRepository;

/**
 * Class SoftwareRepository
 * @package App\Repositories
 * @version March 28, 2019, 2:39 pm +0430
*/

class SoftwareRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'server_name',
        'status',
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
        return Software::class;
    }
}
