<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VmApiTest extends TestCase
{
    use MakeVmTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVm()
    {
        $vm = $this->fakeVmData();
        $this->json('POST', '/api/v1/vms', $vm);

        $this->assertApiResponse($vm);
    }

    /**
     * @test
     */
    public function testReadVm()
    {
        $vm = $this->makeVm();
        $this->json('GET', '/api/v1/vms/'.$vm->id);

        $this->assertApiResponse($vm->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVm()
    {
        $vm = $this->makeVm();
        $editedVm = $this->fakeVmData();

        $this->json('PUT', '/api/v1/vms/'.$vm->id, $editedVm);

        $this->assertApiResponse($editedVm);
    }

    /**
     * @test
     */
    public function testDeleteVm()
    {
        $vm = $this->makeVm();
        $this->json('DELETE', '/api/v1/vms/'.$vm->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/vms/'.$vm->id);

        $this->assertResponseStatus(404);
    }
}
