<?php

use Faker\Factory as Faker;
use App\Models\Webaddress;
use App\Repositories\WebaddressRepository;

trait MakeWebaddressTrait
{
    /**
     * Create fake instance of Webaddress and save it in database
     *
     * @param array $webaddressFields
     * @return Webaddress
     */
    public function makeWebaddress($webaddressFields = [])
    {
        /** @var WebaddressRepository $webaddressRepo */
        $webaddressRepo = App::make(WebaddressRepository::class);
        $theme = $this->fakeWebaddressData($webaddressFields);
        return $webaddressRepo->create($theme);
    }

    /**
     * Get fake instance of Webaddress
     *
     * @param array $webaddressFields
     * @return Webaddress
     */
    public function fakeWebaddress($webaddressFields = [])
    {
        return new Webaddress($this->fakeWebaddressData($webaddressFields));
    }

    /**
     * Get fake data of Webaddress
     *
     * @param array $postFields
     * @return array
     */
    public function fakeWebaddressData($webaddressFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'url' => $fake->word,
            'status' => $fake->word,
            'user_id' => $fake->word,
            'software_id' => $fake->word,
            'desc' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $webaddressFields);
    }
}
