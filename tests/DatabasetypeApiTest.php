<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DatabasetypeApiTest extends TestCase
{
    use MakeDatabasetypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDatabasetype()
    {
        $databasetype = $this->fakeDatabasetypeData();
        $this->json('POST', '/api/v1/databasetypes', $databasetype);

        $this->assertApiResponse($databasetype);
    }

    /**
     * @test
     */
    public function testReadDatabasetype()
    {
        $databasetype = $this->makeDatabasetype();
        $this->json('GET', '/api/v1/databasetypes/'.$databasetype->id);

        $this->assertApiResponse($databasetype->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDatabasetype()
    {
        $databasetype = $this->makeDatabasetype();
        $editedDatabasetype = $this->fakeDatabasetypeData();

        $this->json('PUT', '/api/v1/databasetypes/'.$databasetype->id, $editedDatabasetype);

        $this->assertApiResponse($editedDatabasetype);
    }

    /**
     * @test
     */
    public function testDeleteDatabasetype()
    {
        $databasetype = $this->makeDatabasetype();
        $this->json('DELETE', '/api/v1/databasetypes/'.$databasetype->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/databasetypes/'.$databasetype->id);

        $this->assertResponseStatus(404);
    }
}
