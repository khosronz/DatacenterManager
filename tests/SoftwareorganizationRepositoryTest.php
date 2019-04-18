<?php

use App\Models\Softwareorganization;
use App\Repositories\SoftwareorganizationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SoftwareorganizationRepositoryTest extends TestCase
{
    use MakeSoftwareorganizationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SoftwareorganizationRepository
     */
    protected $softwareorganizationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->softwareorganizationRepo = App::make(SoftwareorganizationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSoftwareorganization()
    {
        $softwareorganization = $this->fakeSoftwareorganizationData();
        $createdSoftwareorganization = $this->softwareorganizationRepo->create($softwareorganization);
        $createdSoftwareorganization = $createdSoftwareorganization->toArray();
        $this->assertArrayHasKey('id', $createdSoftwareorganization);
        $this->assertNotNull($createdSoftwareorganization['id'], 'Created Softwareorganization must have id specified');
        $this->assertNotNull(Softwareorganization::find($createdSoftwareorganization['id']), 'Softwareorganization with given id must be in DB');
        $this->assertModelData($softwareorganization, $createdSoftwareorganization);
    }

    /**
     * @test read
     */
    public function testReadSoftwareorganization()
    {
        $softwareorganization = $this->makeSoftwareorganization();
        $dbSoftwareorganization = $this->softwareorganizationRepo->find($softwareorganization->id);
        $dbSoftwareorganization = $dbSoftwareorganization->toArray();
        $this->assertModelData($softwareorganization->toArray(), $dbSoftwareorganization);
    }

    /**
     * @test update
     */
    public function testUpdateSoftwareorganization()
    {
        $softwareorganization = $this->makeSoftwareorganization();
        $fakeSoftwareorganization = $this->fakeSoftwareorganizationData();
        $updatedSoftwareorganization = $this->softwareorganizationRepo->update($fakeSoftwareorganization, $softwareorganization->id);
        $this->assertModelData($fakeSoftwareorganization, $updatedSoftwareorganization->toArray());
        $dbSoftwareorganization = $this->softwareorganizationRepo->find($softwareorganization->id);
        $this->assertModelData($fakeSoftwareorganization, $dbSoftwareorganization->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSoftwareorganization()
    {
        $softwareorganization = $this->makeSoftwareorganization();
        $resp = $this->softwareorganizationRepo->delete($softwareorganization->id);
        $this->assertTrue($resp);
        $this->assertNull(Softwareorganization::find($softwareorganization->id), 'Softwareorganization should not exist in DB');
    }
}
