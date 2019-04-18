<?php

use App\Models\Vmtype;
use App\Repositories\VmtypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VmtypeRepositoryTest extends TestCase
{
    use MakeVmtypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VmtypeRepository
     */
    protected $vmtypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->vmtypeRepo = App::make(VmtypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVmtype()
    {
        $vmtype = $this->fakeVmtypeData();
        $createdVmtype = $this->vmtypeRepo->create($vmtype);
        $createdVmtype = $createdVmtype->toArray();
        $this->assertArrayHasKey('id', $createdVmtype);
        $this->assertNotNull($createdVmtype['id'], 'Created Vmtype must have id specified');
        $this->assertNotNull(Vmtype::find($createdVmtype['id']), 'Vmtype with given id must be in DB');
        $this->assertModelData($vmtype, $createdVmtype);
    }

    /**
     * @test read
     */
    public function testReadVmtype()
    {
        $vmtype = $this->makeVmtype();
        $dbVmtype = $this->vmtypeRepo->find($vmtype->id);
        $dbVmtype = $dbVmtype->toArray();
        $this->assertModelData($vmtype->toArray(), $dbVmtype);
    }

    /**
     * @test update
     */
    public function testUpdateVmtype()
    {
        $vmtype = $this->makeVmtype();
        $fakeVmtype = $this->fakeVmtypeData();
        $updatedVmtype = $this->vmtypeRepo->update($fakeVmtype, $vmtype->id);
        $this->assertModelData($fakeVmtype, $updatedVmtype->toArray());
        $dbVmtype = $this->vmtypeRepo->find($vmtype->id);
        $this->assertModelData($fakeVmtype, $dbVmtype->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVmtype()
    {
        $vmtype = $this->makeVmtype();
        $resp = $this->vmtypeRepo->delete($vmtype->id);
        $this->assertTrue($resp);
        $this->assertNull(Vmtype::find($vmtype->id), 'Vmtype should not exist in DB');
    }
}
