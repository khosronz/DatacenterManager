<?php

use Faker\Factory as Faker;
use App\Models\Ostype;
use App\Repositories\OstypeRepository;

trait MakeOstypeTrait
{
    /**
     * Create fake instance of Ostype and save it in database
     *
     * @param array $ostypeFields
     * @return Ostype
     */
    public function makeOstype($ostypeFields = [])
    {
        /** @var OstypeRepository $ostypeRepo */
        $ostypeRepo = App::make(OstypeRepository::class);
        $theme = $this->fakeOstypeData($ostypeFields);
        return $ostypeRepo->create($theme);
    }

    /**
     * Get fake instance of Ostype
     *
     * @param array $ostypeFields
     * @return Ostype
     */
    public function fakeOstype($ostypeFields = [])
    {
        return new Ostype($this->fakeOstypeData($ostypeFields));
    }

    /**
     * Get fake data of Ostype
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOstypeData($ostypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'status' => $fake->word,
            'desc' => $fake->text,
            'user_id' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $ostypeFields);
    }
}
