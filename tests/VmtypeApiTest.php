<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VmtypeApiTest extends TestCase
{
    use MakeVmtypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVmtype()
    {
        $vmtype = $this->fakeVmtypeData();
        $this->json('POST', '/api/v1/vmtypes', $vmtype);

        $this->assertApiResponse($vmtype);
    }

    /**
     * @test
     */
    public function testReadVmtype()
    {
        $vmtype = $this->makeVmtype();
        $this->json('GET', '/api/v1/vmtypes/'.$vmtype->id);

        $this->assertApiResponse($vmtype->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVmtype()
    {
        $vmtype = $this->makeVmtype();
        $editedVmtype = $this->fakeVmtypeData();

        $this->json('PUT', '/api/v1/vmtypes/'.$vmtype->id, $editedVmtype);

        $this->assertApiResponse($editedVmtype);
    }

    /**
     * @test
     */
    public function testDeleteVmtype()
    {
        $vmtype = $this->makeVmtype();
        $this->json('DELETE', '/api/v1/vmtypes/'.$vmtype->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/vmtypes/'.$vmtype->id);

        $this->assertResponseStatus(404);
    }
}
