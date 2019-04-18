<?php

use Faker\Factory as Faker;
use App\Models\Softwaredesc;
use App\Repositories\SoftwaredescRepository;

trait MakeSoftwaredescTrait
{
    /**
     * Create fake instance of Softwaredesc and save it in database
     *
     * @param array $softwaredescFields
     * @return Softwaredesc
     */
    public function makeSoftwaredesc($softwaredescFields = [])
    {
        /** @var SoftwaredescRepository $softwaredescRepo */
        $softwaredescRepo = App::make(SoftwaredescRepository::class);
        $theme = $this->fakeSoftwaredescData($softwaredescFields);
        return $softwaredescRepo->create($theme);
    }

    /**
     * Get fake instance of Softwaredesc
     *
     * @param array $softwaredescFields
     * @return Softwaredesc
     */
    public function fakeSoftwaredesc($softwaredescFields = [])
    {
        return new Softwaredesc($this->fakeSoftwaredescData($softwaredescFields));
    }

    /**
     * Get fake data of Softwaredesc
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSoftwaredescData($softwaredescFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'status' => $fake->word,
            'desc_date' => $fake->word,
            'user_id' => $fake->word,
            'software_id' => $fake->word,
            'desc' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $softwaredescFields);
    }
}
