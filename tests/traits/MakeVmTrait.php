<?php

use Faker\Factory as Faker;
use App\Models\Vm;
use App\Repositories\VmRepository;

trait MakeVmTrait
{
    /**
     * Create fake instance of Vm and save it in database
     *
     * @param array $vmFields
     * @return Vm
     */
    public function makeVm($vmFields = [])
    {
        /** @var VmRepository $vmRepo */
        $vmRepo = App::make(VmRepository::class);
        $theme = $this->fakeVmData($vmFields);
        return $vmRepo->create($theme);
    }

    /**
     * Get fake instance of Vm
     *
     * @param array $vmFields
     * @return Vm
     */
    public function fakeVm($vmFields = [])
    {
        return new Vm($this->fakeVmData($vmFields));
    }

    /**
     * Get fake data of Vm
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVmData($vmFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'username' => $fake->word,
            'password' => $fake->word,
            'ip' => $fake->word,
            'desc' => $fake->text,
            'user_id' => $fake->word,
            'vmtype_id' => $fake->word,
            'software_id' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $vmFields);
    }
}
