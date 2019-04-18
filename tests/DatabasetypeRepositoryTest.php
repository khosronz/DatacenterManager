<?php

use App\Models\Databasetype;
use App\Repositories\DatabasetypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DatabasetypeRepositoryTest extends TestCase
{
    use MakeDatabasetypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DatabasetypeRepository
     */
    protected $databasetypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->databasetypeRepo = App::make(DatabasetypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDatabasetype()
    {
        $databasetype = $this->fakeDatabasetypeData();
        $createdDatabasetype = $this->databasetypeRepo->create($databasetype);
        $createdDatabasetype = $createdDatabasetype->toArray();
        $this->assertArrayHasKey('id', $createdDatabasetype);
        $this->assertNotNull($createdDatabasetype['id'], 'Created Databasetype must have id specified');
        $this->assertNotNull(Databasetype::find($createdDatabasetype['id']), 'Databasetype with given id must be in DB');
        $this->assertModelData($databasetype, $createdDatabasetype);
    }

    /**
     * @test read
     */
    public function testReadDatabasetype()
    {
        $databasetype = $this->makeDatabasetype();
        $dbDatabasetype = $this->databasetypeRepo->find($databasetype->id);
        $dbDatabasetype = $dbDatabasetype->toArray();
        $this->assertModelData($databasetype->toArray(), $dbDatabasetype);
    }

    /**
     * @test update
     */
    public function testUpdateDatabasetype()
    {
        $databasetype = $this->makeDatabasetype();
        $fakeDatabasetype = $this->fakeDatabasetypeData();
        $updatedDatabasetype = $this->databasetypeRepo->update($fakeDatabasetype, $databasetype->id);
        $this->assertModelData($fakeDatabasetype, $updatedDatabasetype->toArray());
        $dbDatabasetype = $this->databasetypeRepo->find($databasetype->id);
        $this->assertModelData($fakeDatabasetype, $dbDatabasetype->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDatabasetype()
    {
        $databasetype = $this->makeDatabasetype();
        $resp = $this->databasetypeRepo->delete($databasetype->id);
        $this->assertTrue($resp);
        $this->assertNull(Databasetype::find($databasetype->id), 'Databasetype should not exist in DB');
    }
}
