<?php

use Faker\Factory as Faker;
use App\Models\Iprange;
use App\Repositories\IprangeRepository;

trait MakeIprangeTrait
{
    /**
     * Create fake instance of Iprange and save it in database
     *
     * @param array $iprangeFields
     * @return Iprange
     */
    public function makeIprange($iprangeFields = [])
    {
        /** @var IprangeRepository $iprangeRepo */
        $iprangeRepo = App::make(IprangeRepository::class);
        $theme = $this->fakeIprangeData($iprangeFields);
        return $iprangeRepo->create($theme);
    }

    /**
     * Get fake instance of Iprange
     *
     * @param array $iprangeFields
     * @return Iprange
     */
    public function fakeIprange($iprangeFields = [])
    {
        return new Iprange($this->fakeIprangeData($iprangeFields));
    }

    /**
     * Get fake data of Iprange
     *
     * @param array $postFields
     * @return array
     */
    public function fakeIprangeData($iprangeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'status' => $fake->word,
            'from' => $fake->word,
            'to' => $fake->word,
            'user_id' => $fake->word,
            'location_id' => $fake->word,
            'desc' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $iprangeFields);
    }
}
