<?php

use App\Models\Connectiontype;
use App\Repositories\ConnectiontypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConnectiontypeRepositoryTest extends TestCase
{
    use MakeConnectiontypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConnectiontypeRepository
     */
    protected $connectiontypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->connectiontypeRepo = App::make(ConnectiontypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateConnectiontype()
    {
        $connectiontype = $this->fakeConnectiontypeData();
        $createdConnectiontype = $this->connectiontypeRepo->create($connectiontype);
        $createdConnectiontype = $createdConnectiontype->toArray();
        $this->assertArrayHasKey('id', $createdConnectiontype);
        $this->assertNotNull($createdConnectiontype['id'], 'Created Connectiontype must have id specified');
        $this->assertNotNull(Connectiontype::find($createdConnectiontype['id']), 'Connectiontype with given id must be in DB');
        $this->assertModelData($connectiontype, $createdConnectiontype);
    }

    /**
     * @test read
     */
    public function testReadConnectiontype()
    {
        $connectiontype = $this->makeConnectiontype();
        $dbConnectiontype = $this->connectiontypeRepo->find($connectiontype->id);
        $dbConnectiontype = $dbConnectiontype->toArray();
        $this->assertModelData($connectiontype->toArray(), $dbConnectiontype);
    }

    /**
     * @test update
     */
    public function testUpdateConnectiontype()
    {
        $connectiontype = $this->makeConnectiontype();
        $fakeConnectiontype = $this->fakeConnectiontypeData();
        $updatedConnectiontype = $this->connectiontypeRepo->update($fakeConnectiontype, $connectiontype->id);
        $this->assertModelData($fakeConnectiontype, $updatedConnectiontype->toArray());
        $dbConnectiontype = $this->connectiontypeRepo->find($connectiontype->id);
        $this->assertModelData($fakeConnectiontype, $dbConnectiontype->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteConnectiontype()
    {
        $connectiontype = $this->makeConnectiontype();
        $resp = $this->connectiontypeRepo->delete($connectiontype->id);
        $this->assertTrue($resp);
        $this->assertNull(Connectiontype::find($connectiontype->id), 'Connectiontype should not exist in DB');
    }
}
