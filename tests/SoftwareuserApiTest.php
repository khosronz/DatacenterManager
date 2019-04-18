<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SoftwareuserApiTest extends TestCase
{
    use MakeSoftwareuserTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSoftwareuser()
    {
        $softwareuser = $this->fakeSoftwareuserData();
        $this->json('POST', '/api/v1/softwareusers', $softwareuser);

        $this->assertApiResponse($softwareuser);
    }

    /**
     * @test
     */
    public function testReadSoftwareuser()
    {
        $softwareuser = $this->makeSoftwareuser();
        $this->json('GET', '/api/v1/softwareusers/'.$softwareuser->id);

        $this->assertApiResponse($softwareuser->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSoftwareuser()
    {
        $softwareuser = $this->makeSoftwareuser();
        $editedSoftwareuser = $this->fakeSoftwareuserData();

        $this->json('PUT', '/api/v1/softwareusers/'.$softwareuser->id, $editedSoftwareuser);

        $this->assertApiResponse($editedSoftwareuser);
    }

    /**
     * @test
     */
    public function testDeleteSoftwareuser()
    {
        $softwareuser = $this->makeSoftwareuser();
        $this->json('DELETE', '/api/v1/softwareusers/'.$softwareuser->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/softwareusers/'.$softwareuser->id);

        $this->assertResponseStatus(404);
    }
}
