<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OsApiTest extends TestCase
{
    use MakeOsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOs()
    {
        $os = $this->fakeOsData();
        $this->json('POST', '/api/v1/os', $os);

        $this->assertApiResponse($os);
    }

    /**
     * @test
     */
    public function testReadOs()
    {
        $os = $this->makeOs();
        $this->json('GET', '/api/v1/os/'.$os->id);

        $this->assertApiResponse($os->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOs()
    {
        $os = $this->makeOs();
        $editedOs = $this->fakeOsData();

        $this->json('PUT', '/api/v1/os/'.$os->id, $editedOs);

        $this->assertApiResponse($editedOs);
    }

    /**
     * @test
     */
    public function testDeleteOs()
    {
        $os = $this->makeOs();
        $this->json('DELETE', '/api/v1/os/'.$os->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/os/'.$os->id);

        $this->assertResponseStatus(404);
    }
}
