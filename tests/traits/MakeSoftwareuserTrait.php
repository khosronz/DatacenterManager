<?php

use Faker\Factory as Faker;
use App\Models\Softwareuser;
use App\Repositories\SoftwareuserRepository;

trait MakeSoftwareuserTrait
{
    /**
     * Create fake instance of Softwareuser and save it in database
     *
     * @param array $softwareuserFields
     * @return Softwareuser
     */
    public function makeSoftwareuser($softwareuserFields = [])
    {
        /** @var SoftwareuserRepository $softwareuserRepo */
        $softwareuserRepo = App::make(SoftwareuserRepository::class);
        $theme = $this->fakeSoftwareuserData($softwareuserFields);
        return $softwareuserRepo->create($theme);
    }

    /**
     * Get fake instance of Softwareuser
     *
     * @param array $softwareuserFields
     * @return Softwareuser
     */
    public function fakeSoftwareuser($softwareuserFields = [])
    {
        return new Softwareuser($this->fakeSoftwareuserData($softwareuserFields));
    }

    /**
     * Get fake data of Softwareuser
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSoftwareuserData($softwareuserFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'user_id' => $fake->word,
            'user_related_id' => $fake->word,
            'software_id' => $fake->word,
            'desc' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $softwareuserFields);
    }
}
