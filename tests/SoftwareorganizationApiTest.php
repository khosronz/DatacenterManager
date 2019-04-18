<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SoftwareorganizationApiTest extends TestCase
{
    use MakeSoftwareorganizationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSoftwareorganization()
    {
        $softwareorganization = $this->fakeSoftwareorganizationData();
        $this->json('POST', '/api/v1/softwareorganizations', $softwareorganization);

        $this->assertApiResponse($softwareorganization);
    }

    /**
     * @test
     */
    public function testReadSoftwareorganization()
    {
        $softwareorganization = $this->makeSoftwareorganization();
        $this->json('GET', '/api/v1/softwareorganizations/'.$softwareorganization->id);

        $this->assertApiResponse($softwareorganization->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSoftwareorganization()
    {
        $softwareorganization = $this->makeSoftwareorganization();
        $editedSoftwareorganization = $this->fakeSoftwareorganizationData();

        $this->json('PUT', '/api/v1/softwareorganizations/'.$softwareorganization->id, $editedSoftwareorganization);

        $this->assertApiResponse($editedSoftwareorganization);
    }

    /**
     * @test
     */
    public function testDeleteSoftwareorganization()
    {
        $softwareorganization = $this->makeSoftwareorganization();
        $this->json('DELETE', '/api/v1/softwareorganizations/'.$softwareorganization->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/softwareorganizations/'.$softwareorganization->id);

        $this->assertResponseStatus(404);
    }
}
