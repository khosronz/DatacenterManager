<?php

use App\Models\Os;
use App\Repositories\OsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OsRepositoryTest extends TestCase
{
    use MakeOsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OsRepository
     */
    protected $osRepo;

    public function setUp()
    {
        parent::setUp();
        $this->osRepo = App::make(OsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateOs()
    {
        $os = $this->fakeOsData();
        $createdOs = $this->osRepo->create($os);
        $createdOs = $createdOs->toArray();
        $this->assertArrayHasKey('id', $createdOs);
        $this->assertNotNull($createdOs['id'], 'Created Os must have id specified');
        $this->assertNotNull(Os::find($createdOs['id']), 'Os with given id must be in DB');
        $this->assertModelData($os, $createdOs);
    }

    /**
     * @test read
     */
    public function testReadOs()
    {
        $os = $this->makeOs();
        $dbOs = $this->osRepo->find($os->id);
        $dbOs = $dbOs->toArray();
        $this->assertModelData($os->toArray(), $dbOs);
    }

    /**
     * @test update
     */
    public function testUpdateOs()
    {
        $os = $this->makeOs();
        $fakeOs = $this->fakeOsData();
        $updatedOs = $this->osRepo->update($fakeOs, $os->id);
        $this->assertModelData($fakeOs, $updatedOs->toArray());
        $dbOs = $this->osRepo->find($os->id);
        $this->assertModelData($fakeOs, $dbOs->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteOs()
    {
        $os = $this->makeOs();
        $resp = $this->osRepo->delete($os->id);
        $this->assertTrue($resp);
        $this->assertNull(Os::find($os->id), 'Os should not exist in DB');
    }
}
