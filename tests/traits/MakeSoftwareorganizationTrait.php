<?php

use Faker\Factory as Faker;
use App\Models\Softwareorganization;
use App\Repositories\SoftwareorganizationRepository;

trait MakeSoftwareorganizationTrait
{
    /**
     * Create fake instance of Softwareorganization and save it in database
     *
     * @param array $softwareorganizationFields
     * @return Softwareorganization
     */
    public function makeSoftwareorganization($softwareorganizationFields = [])
    {
        /** @var SoftwareorganizationRepository $softwareorganizationRepo */
        $softwareorganizationRepo = App::make(SoftwareorganizationRepository::class);
        $theme = $this->fakeSoftwareorganizationData($softwareorganizationFields);
        return $softwareorganizationRepo->create($theme);
    }

    /**
     * Get fake instance of Softwareorganization
     *
     * @param array $softwareorganizationFields
     * @return Softwareorganization
     */
    public function fakeSoftwareorganization($softwareorganizationFields = [])
    {
        return new Softwareorganization($this->fakeSoftwareorganizationData($softwareorganizationFields));
    }

    /**
     * Get fake data of Softwareorganization
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSoftwareorganizationData($softwareorganizationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->word,
            'organization_id' => $fake->word,
            'software_id' => $fake->word,
            'status' => $fake->word,
            'relation_type' => $fake->word,
            'desc' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $softwareorganizationFields);
    }
}
