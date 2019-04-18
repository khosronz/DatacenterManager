<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SoftwaredescApiTest extends TestCase
{
    use MakeSoftwaredescTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSoftwaredesc()
    {
        $softwaredesc = $this->fakeSoftwaredescData();
        $this->json('POST', '/api/v1/softwaredescs', $softwaredesc);

        $this->assertApiResponse($softwaredesc);
    }

    /**
     * @test
     */
    public function testReadSoftwaredesc()
    {
        $softwaredesc = $this->makeSoftwaredesc();
        $this->json('GET', '/api/v1/softwaredescs/'.$softwaredesc->id);

        $this->assertApiResponse($softwaredesc->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSoftwaredesc()
    {
        $softwaredesc = $this->makeSoftwaredesc();
        $editedSoftwaredesc = $this->fakeSoftwaredescData();

        $this->json('PUT', '/api/v1/softwaredescs/'.$softwaredesc->id, $editedSoftwaredesc);

        $this->assertApiResponse($editedSoftwaredesc);
    }

    /**
     * @test
     */
    public function testDeleteSoftwaredesc()
    {
        $softwaredesc = $this->makeSoftwaredesc();
        $this->json('DELETE', '/api/v1/softwaredescs/'.$softwaredesc->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/softwaredescs/'.$softwaredesc->id);

        $this->assertResponseStatus(404);
    }
}
