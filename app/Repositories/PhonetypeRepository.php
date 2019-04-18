<?php

namespace App\Repositories;

use App\Models\Phonetype;
use App\Repositories\BaseRepository;

/**
 * Class PhonetypeRepository
 * @package App\Repositories
 * @version March 20, 2019, 9:52 pm +0330
*/

class PhonetypeRepository extends BaseRepository
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
        return Phonetype::class;
    }
}
