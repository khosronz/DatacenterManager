<?php

use Faker\Factory as Faker;
use App\Models\Roleuser;
use App\Repositories\RoleuserRepository;

trait MakeRoleuserTrait
{
    /**
     * Create fake instance of Roleuser and save it in database
     *
     * @param array $roleuserFields
     * @return Roleuser
     */
    public function makeRoleuser($roleuserFields = [])
    {
        /** @var RoleuserRepository $roleuserRepo */
        $roleuserRepo = App::make(RoleuserRepository::class);
        $theme = $this->fakeRoleuserData($roleuserFields);
        return $roleuserRepo->create($theme);
    }

    /**
     * Get fake instance of Roleuser
     *
     * @param array $roleuserFields
     * @return Roleuser
     */
    public function fakeRoleuser($roleuserFields = [])
    {
        return new Roleuser($this->fakeRoleuserData($roleuserFields));
    }

    /**
     * Get fake data of Roleuser
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRoleuserData($roleuserFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->word,
            'user_related_id' => $fake->word,
            'role_id' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $roleuserFields);
    }
}
