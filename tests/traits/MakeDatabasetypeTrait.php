<?php

use Faker\Factory as Faker;
use App\Models\Databasetype;
use App\Repositories\DatabasetypeRepository;

trait MakeDatabasetypeTrait
{
    /**
     * Create fake instance of Databasetype and save it in database
     *
     * @param array $databasetypeFields
     * @return Databasetype
     */
    public function makeDatabasetype($databasetypeFields = [])
    {
        /** @var DatabasetypeRepository $databasetypeRepo */
        $databasetypeRepo = App::make(DatabasetypeRepository::class);
        $theme = $this->fakeDatabasetypeData($databasetypeFields);
        return $databasetypeRepo->create($theme);
    }

    /**
     * Get fake instance of Databasetype
     *
     * @param array $databasetypeFields
     * @return Databasetype
     */
    public function fakeDatabasetype($databasetypeFields = [])
    {
        return new Databasetype($this->fakeDatabasetypeData($databasetypeFields));
    }

    /**
     * Get fake data of Databasetype
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDatabasetypeData($databasetypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'standard_port' => $fake->word,
            'desc' => $fake->text,
            'user_id' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $databasetypeFields);
    }
}
