<?php

namespace App\Repositories;

use App\Models\Os;
use App\Repositories\BaseRepository;

/**
 * Class OsRepository
 * @package App\Repositories
 * @version March 17, 2019, 6:37 pm +0330
*/

class OsRepository extends BaseRepository
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
        return Os::class;
    }
}
