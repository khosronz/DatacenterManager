<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DatabaseApiTest extends TestCase
{
    use MakeDatabaseTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDatabase()
    {
        $database = $this->fakeDatabaseData();
        $this->json('POST', '/api/v1/databases', $database);

        $this->assertApiResponse($database);
    }

    /**
     * @test
     */
    public function testReadDatabase()
    {
        $database = $this->makeDatabase();
        $this->json('GET', '/api/v1/databases/'.$database->id);

        $this->assertApiResponse($database->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDatabase()
    {
        $database = $this->makeDatabase();
        $editedDatabase = $this->fakeDatabaseData();

        $this->json('PUT', '/api/v1/databases/'.$database->id, $editedDatabase);

        $this->assertApiResponse($editedDatabase);
    }

    /**
     * @test
     */
    public function testDeleteDatabase()
    {
        $database = $this->makeDatabase();
        $this->json('DELETE', '/api/v1/databases/'.$database->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/databases/'.$database->id);

        $this->assertResponseStatus(404);
    }
}
