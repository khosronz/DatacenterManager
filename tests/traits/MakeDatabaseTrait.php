<?php

use Faker\Factory as Faker;
use App\Models\Database;
use App\Repositories\DatabaseRepository;

trait MakeDatabaseTrait
{
    /**
     * Create fake instance of Database and save it in database
     *
     * @param array $databaseFields
     * @return Database
     */
    public function makeDatabase($databaseFields = [])
    {
        /** @var DatabaseRepository $databaseRepo */
        $databaseRepo = App::make(DatabaseRepository::class);
        $theme = $this->fakeDatabaseData($databaseFields);
        return $databaseRepo->create($theme);
    }

    /**
     * Get fake instance of Database
     *
     * @param array $databaseFields
     * @return Database
     */
    public function fakeDatabase($databaseFields = [])
    {
        return new Database($this->fakeDatabaseData($databaseFields));
    }

    /**
     * Get fake data of Database
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDatabaseData($databaseFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'username' => $fake->word,
            'password' => $fake->word,
            'status' => $fake->word,
            'port' => $fake->word,
            'user_id' => $fake->word,
            'databasetype_id' => $fake->word,
            'software_id' => $fake->word,
            'desc' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $databaseFields);
    }
}
