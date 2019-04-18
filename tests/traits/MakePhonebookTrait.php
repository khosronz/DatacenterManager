<?php

use Faker\Factory as Faker;
use App\Models\Phonebook;
use App\Repositories\PhonebookRepository;

trait MakePhonebookTrait
{
    /**
     * Create fake instance of Phonebook and save it in database
     *
     * @param array $phonebookFields
     * @return Phonebook
     */
    public function makePhonebook($phonebookFields = [])
    {
        /** @var PhonebookRepository $phonebookRepo */
        $phonebookRepo = App::make(PhonebookRepository::class);
        $theme = $this->fakePhonebookData($phonebookFields);
        return $phonebookRepo->create($theme);
    }

    /**
     * Get fake instance of Phonebook
     *
     * @param array $phonebookFields
     * @return Phonebook
     */
    public function fakePhonebook($phonebookFields = [])
    {
        return new Phonebook($this->fakePhonebookData($phonebookFields));
    }

    /**
     * Get fake data of Phonebook
     *
     * @param array $postFields
     * @return array
     */
    public function fakePhonebookData($phonebookFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'phone_number' => $fake->word,
            'status' => $fake->word,
            'desc' => $fake->text,
            'user_id' => $fake->word,
            'phonetype_id' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $phonebookFields);
    }
}
