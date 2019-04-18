<?php

use Faker\Factory as Faker;
use App\Models\Os;
use App\Repositories\OsRepository;

trait MakeOsTrait
{
    /**
     * Create fake instance of Os and save it in database
     *
     * @param array $osFields
     * @return Os
     */
    public function makeOs($osFields = [])
    {
        /** @var OsRepository $osRepo */
        $osRepo = App::make(OsRepository::class);
        $theme = $this->fakeOsData($osFields);
        return $osRepo->create($theme);
    }

    /**
     * Get fake instance of Os
     *
     * @param array $osFields
     * @return Os
     */
    public function fakeOs($osFields = [])
    {
        return new Os($this->fakeOsData($osFields));
    }

    /**
     * Get fake data of Os
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOsData($osFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'status' => $fake->word,
            'desc' => $fake->text,
            'ostype_id' => $fake->word,
            'user_id' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $osFields);
    }
}
