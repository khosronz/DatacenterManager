<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DomainApiTest extends TestCase
{
    use MakeDomainTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDomain()
    {
        $domain = $this->fakeDomainData();
        $this->json('POST', '/api/v1/domains', $domain);

        $this->assertApiResponse($domain);
    }

    /**
     * @test
     */
    public function testReadDomain()
    {
        $domain = $this->makeDomain();
        $this->json('GET', '/api/v1/domains/'.$domain->id);

        $this->assertApiResponse($domain->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDomain()
    {
        $domain = $this->makeDomain();
        $editedDomain = $this->fakeDomainData();

        $this->json('PUT', '/api/v1/domains/'.$domain->id, $editedDomain);

        $this->assertApiResponse($editedDomain);
    }

    /**
     * @test
     */
    public function testDeleteDomain()
    {
        $domain = $this->makeDomain();
        $this->json('DELETE', '/api/v1/domains/'.$domain->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/domains/'.$domain->id);

        $this->assertResponseStatus(404);
    }
}
