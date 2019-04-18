<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SoftwareApiTest extends TestCase
{
    use MakeSoftwareTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSoftware()
    {
        $software = $this->fakeSoftwareData();
        $this->json('POST', '/api/v1/software', $software);

        $this->assertApiResponse($software);
    }

    /**
     * @test
     */
    public function testReadSoftware()
    {
        $software = $this->makeSoftware();
        $this->json('GET', '/api/v1/software/'.$software->id);

        $this->assertApiResponse($software->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSoftware()
    {
        $software = $this->makeSoftware();
        $editedSoftware = $this->fakeSoftwareData();

        $this->json('PUT', '/api/v1/software/'.$software->id, $editedSoftware);

        $this->assertApiResponse($editedSoftware);
    }

    /**
     * @test
     */
    public function testDeleteSoftware()
    {
        $software = $this->makeSoftware();
        $this->json('DELETE', '/api/v1/software/'.$software->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/software/'.$software->id);

        $this->assertResponseStatus(404);
    }
}
