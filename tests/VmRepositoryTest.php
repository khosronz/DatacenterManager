<?php

use App\Models\Vm;
use App\Repositories\VmRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VmRepositoryTest extends TestCase
{
    use MakeVmTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VmRepository
     */
    protected $vmRepo;

    public function setUp()
    {
        parent::setUp();
        $this->vmRepo = App::make(VmRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVm()
    {
        $vm = $this->fakeVmData();
        $createdVm = $this->vmRepo->create($vm);
        $createdVm = $createdVm->toArray();
        $this->assertArrayHasKey('id', $createdVm);
        $this->assertNotNull($createdVm['id'], 'Created Vm must have id specified');
        $this->assertNotNull(Vm::find($createdVm['id']), 'Vm with given id must be in DB');
        $this->assertModelData($vm, $createdVm);
    }

    /**
     * @test read
     */
    public function testReadVm()
    {
        $vm = $this->makeVm();
        $dbVm = $this->vmRepo->find($vm->id);
        $dbVm = $dbVm->toArray();
        $this->assertModelData($vm->toArray(), $dbVm);
    }

    /**
     * @test update
     */
    public function testUpdateVm()
    {
        $vm = $this->makeVm();
        $fakeVm = $this->fakeVmData();
        $updatedVm = $this->vmRepo->update($fakeVm, $vm->id);
        $this->assertModelData($fakeVm, $updatedVm->toArray());
        $dbVm = $this->vmRepo->find($vm->id);
        $this->assertModelData($fakeVm, $dbVm->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVm()
    {
        $vm = $this->makeVm();
        $resp = $this->vmRepo->delete($vm->id);
        $this->assertTrue($resp);
        $this->assertNull(Vm::find($vm->id), 'Vm should not exist in DB');
    }
}
