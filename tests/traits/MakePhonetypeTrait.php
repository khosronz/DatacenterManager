<?php

use Faker\Factory as Faker;
use App\Models\Phonetype;
use App\Repositories\PhonetypeRepository;

trait MakePhonetypeTrait
{
    /**
     * Create fake instance of Phonetype and save it in database
     *
     * @param array $phonetypeFields
     * @return Phonetype
     */
    public function makePhonetype($phonetypeFields = [])
    {
        /** @var PhonetypeRepository $phonetypeRepo */
        $phonetypeRepo = App::make(PhonetypeRepository::class);
        $theme = $this->fakePhonetypeData($phonetypeFields);
        return $phonetypeRepo->create($theme);
    }

    /**
     * Get fake instance of Phonetype
     *
     * @param array $phonetypeFields
     * @return Phonetype
     */
    public function fakePhonetype($phonetypeFields = [])
    {
        return new Phonetype($this->fakePhonetypeData($phonetypeFields));
    }

    /**
     * Get fake data of Phonetype
     *
     * @param array $postFields
     * @return array
     */
    public function fakePhonetypeData($phonetypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'status' => $fake->word,
            'desc' => $fake->text,
            'user_id' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $phonetypeFields);
    }
}
