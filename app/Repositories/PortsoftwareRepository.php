<?php

namespace App\Repositories;

use App\Models\Portsoftware;
use App\Repositories\BaseRepository;

/**
 * Class PortsoftwareRepository
 * @package App\Repositories
 * @version March 28, 2019, 9:51 pm +0430
*/

class PortsoftwareRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status',
        'port_number'
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
        return Portsoftware::class;
    }
}
