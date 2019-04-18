<?php

use Faker\Factory as Faker;
use App\Models\Software;
use App\Repositories\SoftwareRepository;

trait MakeSoftwareTrait
{
    /**
     * Create fake instance of Software and save it in database
     *
     * @param array $softwareFields
     * @return Software
     */
    public function makeSoftware($softwareFields = [])
    {
        /** @var SoftwareRepository $softwareRepo */
        $softwareRepo = App::make(SoftwareRepository::class);
        $theme = $this->fakeSoftwareData($softwareFields);
        return $softwareRepo->create($theme);
    }

    /**
     * Get fake instance of Software
     *
     * @param array $softwareFields
     * @return Software
     */
    public function fakeSoftware($softwareFields = [])
    {
        return new Software($this->fakeSoftwareData($softwareFields));
    }

    /**
     * Get fake data of Software
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSoftwareData($softwareFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'server_name' => $fake->word,
            'status' => $fake->word,
            'os_id' => $fake->word,
            'ip' => $fake->word,
            'domain_id' => $fake->word,
            'location_id' => $fake->word,
            'user_id' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $softwareFields);
    }
}
