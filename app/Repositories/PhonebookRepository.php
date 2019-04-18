<?php

namespace App\Repositories;

use App\Models\Phonebook;
use App\Repositories\BaseRepository;

/**
 * Class PhonebookRepository
 * @package App\Repositories
 * @version March 22, 2019, 5:15 pm +0430
*/

class PhonebookRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'phone_number',
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
        return Phonebook::class;
    }
}
