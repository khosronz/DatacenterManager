<?php

use Faker\Factory as Faker;
use App\Models\Portsoftware;
use App\Repositories\PortsoftwareRepository;

trait MakePortsoftwareTrait
{
    /**
     * Create fake instance of Portsoftware and save it in database
     *
     * @param array $portsoftwareFields
     * @return Portsoftware
     */
    public function makePortsoftware($portsoftwareFields = [])
    {
        /** @var PortsoftwareRepository $portsoftwareRepo */
        $portsoftwareRepo = App::make(PortsoftwareRepository::class);
        $theme = $this->fakePortsoftwareData($portsoftwareFields);
        return $portsoftwareRepo->create($theme);
    }

    /**
     * Get fake instance of Portsoftware
     *
     * @param array $portsoftwareFields
     * @return Portsoftware
     */
    public function fakePortsoftware($portsoftwareFields = [])
    {
        return new Portsoftware($this->fakePortsoftwareData($portsoftwareFields));
    }

    /**
     * Get fake data of Portsoftware
     *
     * @param array $postFields
     * @return array
     */
    public function fakePortsoftwareData($portsoftwareFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'status' => $fake->word,
            'port_number' => $fake->word,
            'user_id' => $fake->word,
            'software_id' => $fake->word,
            'desc' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $portsoftwareFields);
    }
}
