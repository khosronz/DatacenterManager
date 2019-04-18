<?php

use Faker\Factory as Faker;
use App\Models\Vmtype;
use App\Repositories\VmtypeRepository;

trait MakeVmtypeTrait
{
    /**
     * Create fake instance of Vmtype and save it in database
     *
     * @param array $vmtypeFields
     * @return Vmtype
     */
    public function makeVmtype($vmtypeFields = [])
    {
        /** @var VmtypeRepository $vmtypeRepo */
        $vmtypeRepo = App::make(VmtypeRepository::class);
        $theme = $this->fakeVmtypeData($vmtypeFields);
        return $vmtypeRepo->create($theme);
    }

    /**
     * Get fake instance of Vmtype
     *
     * @param array $vmtypeFields
     * @return Vmtype
     */
    public function fakeVmtype($vmtypeFields = [])
    {
        return new Vmtype($this->fakeVmtypeData($vmtypeFields));
    }

    /**
     * Get fake data of Vmtype
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVmtypeData($vmtypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'status' => $fake->word,
            'desc' => $fake->text,
            'user_id' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $vmtypeFields);
    }
}
