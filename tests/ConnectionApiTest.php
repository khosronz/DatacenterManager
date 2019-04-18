<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConnectionApiTest extends TestCase
{
    use MakeConnectionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateConnection()
    {
        $connection = $this->fakeConnectionData();
        $this->json('POST', '/api/v1/connections', $connection);

        $this->assertApiResponse($connection);
    }

    /**
     * @test
     */
    public function testReadConnection()
    {
        $connection = $this->makeConnection();
        $this->json('GET', '/api/v1/connections/'.$connection->id);

        $this->assertApiResponse($connection->toArray());
    }

    /**
     * @test
     */
    public function testUpdateConnection()
    {
        $connection = $this->makeConnection();
        $editedConnection = $this->fakeConnectionData();

        $this->json('PUT', '/api/v1/connections/'.$connection->id, $editedConnection);

        $this->assertApiResponse($editedConnection);
    }

    /**
     * @test
     */
    public function testDeleteConnection()
    {
        $connection = $this->makeConnection();
        $this->json('DELETE', '/api/v1/connections/'.$connection->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/connections/'.$connection->id);

        $this->assertResponseStatus(404);
    }
}
