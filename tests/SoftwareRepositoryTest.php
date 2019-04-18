<?php

use App\Models\Software;
use App\Repositories\SoftwareRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SoftwareRepositoryTest extends TestCase
{
    use MakeSoftwareTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SoftwareRepository
     */
    protected $softwareRepo;

    public function setUp()
    {
        parent::setUp();
        $this->softwareRepo = App::make(SoftwareRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSoftware()
    {
        $software = $this->fakeSoftwareData();
        $createdSoftware = $this->softwareRepo->create($software);
        $createdSoftware = $createdSoftware->toArray();
        $this->assertArrayHasKey('id', $createdSoftware);
        $this->assertNotNull($createdSoftware['id'], 'Created Software must have id specified');
        $this->assertNotNull(Software::find($createdSoftware['id']), 'Software with given id must be in DB');
        $this->assertModelData($software, $createdSoftware);
    }

    /**
     * @test read
     */
    public function testReadSoftware()
    {
        $software = $this->makeSoftware();
        $dbSoftware = $this->softwareRepo->find($software->id);
        $dbSoftware = $dbSoftware->toArray();
        $this->assertModelData($software->toArray(), $dbSoftware);
    }

    /**
     * @test update
     */
    public function testUpdateSoftware()
    {
        $software = $this->makeSoftware();
        $fakeSoftware = $this->fakeSoftwareData();
        $updatedSoftware = $this->softwareRepo->update($fakeSoftware, $software->id);
        $this->assertModelData($fakeSoftware, $updatedSoftware->toArray());
        $dbSoftware = $this->softwareRepo->find($software->id);
        $this->assertModelData($fakeSoftware, $dbSoftware->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSoftware()
    {
        $software = $this->makeSoftware();
        $resp = $this->softwareRepo->delete($software->id);
        $this->assertTrue($resp);
        $this->assertNull(Software::find($software->id), 'Software should not exist in DB');
    }
}
