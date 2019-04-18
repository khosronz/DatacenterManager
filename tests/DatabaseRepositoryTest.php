<?php

use App\Models\Database;
use App\Repositories\DatabaseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DatabaseRepositoryTest extends TestCase
{
    use MakeDatabaseTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DatabaseRepository
     */
    protected $databaseRepo;

    public function setUp()
    {
        parent::setUp();
        $this->databaseRepo = App::make(DatabaseRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDatabase()
    {
        $database = $this->fakeDatabaseData();
        $createdDatabase = $this->databaseRepo->create($database);
        $createdDatabase = $createdDatabase->toArray();
        $this->assertArrayHasKey('id', $createdDatabase);
        $this->assertNotNull($createdDatabase['id'], 'Created Database must have id specified');
        $this->assertNotNull(Database::find($createdDatabase['id']), 'Database with given id must be in DB');
        $this->assertModelData($database, $createdDatabase);
    }

    /**
     * @test read
     */
    public function testReadDatabase()
    {
        $database = $this->makeDatabase();
        $dbDatabase = $this->databaseRepo->find($database->id);
        $dbDatabase = $dbDatabase->toArray();
        $this->assertModelData($database->toArray(), $dbDatabase);
    }

    /**
     * @test update
     */
    public function testUpdateDatabase()
    {
        $database = $this->makeDatabase();
        $fakeDatabase = $this->fakeDatabaseData();
        $updatedDatabase = $this->databaseRepo->update($fakeDatabase, $database->id);
        $this->assertModelData($fakeDatabase, $updatedDatabase->toArray());
        $dbDatabase = $this->databaseRepo->find($database->id);
        $this->assertModelData($fakeDatabase, $dbDatabase->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDatabase()
    {
        $database = $this->makeDatabase();
        $resp = $this->databaseRepo->delete($database->id);
        $this->assertTrue($resp);
        $this->assertNull(Database::find($database->id), 'Database should not exist in DB');
    }
}
