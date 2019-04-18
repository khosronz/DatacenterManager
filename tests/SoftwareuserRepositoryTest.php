<?php

use App\Models\Softwareuser;
use App\Repositories\SoftwareuserRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SoftwareuserRepositoryTest extends TestCase
{
    use MakeSoftwareuserTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SoftwareuserRepository
     */
    protected $softwareuserRepo;

    public function setUp()
    {
        parent::setUp();
        $this->softwareuserRepo = App::make(SoftwareuserRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSoftwareuser()
    {
        $softwareuser = $this->fakeSoftwareuserData();
        $createdSoftwareuser = $this->softwareuserRepo->create($softwareuser);
        $createdSoftwareuser = $createdSoftwareuser->toArray();
        $this->assertArrayHasKey('id', $createdSoftwareuser);
        $this->assertNotNull($createdSoftwareuser['id'], 'Created Softwareuser must have id specified');
        $this->assertNotNull(Softwareuser::find($createdSoftwareuser['id']), 'Softwareuser with given id must be in DB');
        $this->assertModelData($softwareuser, $createdSoftwareuser);
    }

    /**
     * @test read
     */
    public function testReadSoftwareuser()
    {
        $softwareuser = $this->makeSoftwareuser();
        $dbSoftwareuser = $this->softwareuserRepo->find($softwareuser->id);
        $dbSoftwareuser = $dbSoftwareuser->toArray();
        $this->assertModelData($softwareuser->toArray(), $dbSoftwareuser);
    }

    /**
     * @test update
     */
    public function testUpdateSoftwareuser()
    {
        $softwareuser = $this->makeSoftwareuser();
        $fakeSoftwareuser = $this->fakeSoftwareuserData();
        $updatedSoftwareuser = $this->softwareuserRepo->update($fakeSoftwareuser, $softwareuser->id);
        $this->assertModelData($fakeSoftwareuser, $updatedSoftwareuser->toArray());
        $dbSoftwareuser = $this->softwareuserRepo->find($softwareuser->id);
        $this->assertModelData($fakeSoftwareuser, $dbSoftwareuser->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSoftwareuser()
    {
        $softwareuser = $this->makeSoftwareuser();
        $resp = $this->softwareuserRepo->delete($softwareuser->id);
        $this->assertTrue($resp);
        $this->assertNull(Softwareuser::find($softwareuser->id), 'Softwareuser should not exist in DB');
    }
}
