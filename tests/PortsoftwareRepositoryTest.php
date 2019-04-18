<?php

use App\Models\Portsoftware;
use App\Repositories\PortsoftwareRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PortsoftwareRepositoryTest extends TestCase
{
    use MakePortsoftwareTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PortsoftwareRepository
     */
    protected $portsoftwareRepo;

    public function setUp()
    {
        parent::setUp();
        $this->portsoftwareRepo = App::make(PortsoftwareRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePortsoftware()
    {
        $portsoftware = $this->fakePortsoftwareData();
        $createdPortsoftware = $this->portsoftwareRepo->create($portsoftware);
        $createdPortsoftware = $createdPortsoftware->toArray();
        $this->assertArrayHasKey('id', $createdPortsoftware);
        $this->assertNotNull($createdPortsoftware['id'], 'Created Portsoftware must have id specified');
        $this->assertNotNull(Portsoftware::find($createdPortsoftware['id']), 'Portsoftware with given id must be in DB');
        $this->assertModelData($portsoftware, $createdPortsoftware);
    }

    /**
     * @test read
     */
    public function testReadPortsoftware()
    {
        $portsoftware = $this->makePortsoftware();
        $dbPortsoftware = $this->portsoftwareRepo->find($portsoftware->id);
        $dbPortsoftware = $dbPortsoftware->toArray();
        $this->assertModelData($portsoftware->toArray(), $dbPortsoftware);
    }

    /**
     * @test update
     */
    public function testUpdatePortsoftware()
    {
        $portsoftware = $this->makePortsoftware();
        $fakePortsoftware = $this->fakePortsoftwareData();
        $updatedPortsoftware = $this->portsoftwareRepo->update($fakePortsoftware, $portsoftware->id);
        $this->assertModelData($fakePortsoftware, $updatedPortsoftware->toArray());
        $dbPortsoftware = $this->portsoftwareRepo->find($portsoftware->id);
        $this->assertModelData($fakePortsoftware, $dbPortsoftware->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePortsoftware()
    {
        $portsoftware = $this->makePortsoftware();
        $resp = $this->portsoftwareRepo->delete($portsoftware->id);
        $this->assertTrue($resp);
        $this->assertNull(Portsoftware::find($portsoftware->id), 'Portsoftware should not exist in DB');
    }
}
