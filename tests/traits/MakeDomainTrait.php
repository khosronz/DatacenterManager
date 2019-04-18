<?php

use Faker\Factory as Faker;
use App\Models\Domain;
use App\Repositories\DomainRepository;

trait MakeDomainTrait
{
    /**
     * Create fake instance of Domain and save it in database
     *
     * @param array $domainFields
     * @return Domain
     */
    public function makeDomain($domainFields = [])
    {
        /** @var DomainRepository $domainRepo */
        $domainRepo = App::make(DomainRepository::class);
        $theme = $this->fakeDomainData($domainFields);
        return $domainRepo->create($theme);
    }

    /**
     * Get fake instance of Domain
     *
     * @param array $domainFields
     * @return Domain
     */
    public function fakeDomain($domainFields = [])
    {
        return new Domain($this->fakeDomainData($domainFields));
    }

    /**
     * Get fake data of Domain
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDomainData($domainFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'url' => $fake->word,
            'username' => $fake->word,
            'password' => $fake->word,
            'user_id' => $fake->randomDigitNotNull,
            'os_id' => $fake->randomDigitNotNull,
            'desc' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $domainFields);
    }
}
