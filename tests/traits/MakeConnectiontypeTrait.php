<?php

use Faker\Factory as Faker;
use App\Models\Connectiontype;
use App\Repositories\ConnectiontypeRepository;

trait MakeConnectiontypeTrait
{
    /**
     * Create fake instance of Connectiontype and save it in database
     *
     * @param array $connectiontypeFields
     * @return Connectiontype
     */
    public function makeConnectiontype($connectiontypeFields = [])
    {
        /** @var ConnectiontypeRepository $connectiontypeRepo */
        $connectiontypeRepo = App::make(ConnectiontypeRepository::class);
        $theme = $this->fakeConnectiontypeData($connectiontypeFields);
        return $connectiontypeRepo->create($theme);
    }

    /**
     * Get fake instance of Connectiontype
     *
     * @param array $connectiontypeFields
     * @return Connectiontype
     */
    public function fakeConnectiontype($connectiontypeFields = [])
    {
        return new Connectiontype($this->fakeConnectiontypeData($connectiontypeFields));
    }

    /**
     * Get fake data of Connectiontype
     *
     * @param array $postFields
     * @return array
     */
    public function fakeConnectiontypeData($connectiontypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'status' => $fake->word,
            'standard_port' => $fake->word,
            'user_id' => $fake->word,
            'desc' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $connectiontypeFields);
    }
}
