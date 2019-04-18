<?php

use App\Models\Connection;
use App\Repositories\ConnectionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConnectionRepositoryTest extends TestCase
{
    use MakeConnectionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConnectionRepository
     */
    protected $connectionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->connectionRepo = App::make(ConnectionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateConnection()
    {
        $connection = $this->fakeConnectionData();
        $createdConnection = $this->connectionRepo->create($connection);
        $createdConnection = $createdConnection->toArray();
        $this->assertArrayHasKey('id', $createdConnection);
        $this->assertNotNull($createdConnection['id'], 'Created Connection must have id specified');
        $this->assertNotNull(Connection::find($createdConnection['id']), 'Connection with given id must be in DB');
        $this->assertModelData($connection, $createdConnection);
    }

    /**
     * @test read
     */
    public function testReadConnection()
    {
        $connection = $this->makeConnection();
        $dbConnection = $this->connectionRepo->find($connection->id);
        $dbConnection = $dbConnection->toArray();
        $this->assertModelData($connection->toArray(), $dbConnection);
    }

    /**
     * @test update
     */
    public function testUpdateConnection()
    {
        $connection = $this->makeConnection();
        $fakeConnection = $this->fakeConnectionData();
        $updatedConnection = $this->connectionRepo->update($fakeConnection, $connection->id);
        $this->assertModelData($fakeConnection, $updatedConnection->toArray());
        $dbConnection = $this->connectionRepo->find($connection->id);
        $this->assertModelData($fakeConnection, $dbConnection->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteConnection()
    {
        $connection = $this->makeConnection();
        $resp = $this->connectionRepo->delete($connection->id);
        $this->assertTrue($resp);
        $this->assertNull(Connection::find($connection->id), 'Connection should not exist in DB');
    }
}
