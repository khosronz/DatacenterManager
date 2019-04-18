<?php

namespace App\Repositories;

use App\Models\Iprange;
use App\Repositories\BaseRepository;

/**
 * Class IprangeRepository
 * @package App\Repositories
 * @version March 20, 2019, 10:17 pm +0330
*/

class IprangeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status',
        'from',
        'to'
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
        return Iprange::class;
    }
}
