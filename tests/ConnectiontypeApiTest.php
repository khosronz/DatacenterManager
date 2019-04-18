<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConnectiontypeApiTest extends TestCase
{
    use MakeConnectiontypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateConnectiontype()
    {
        $connectiontype = $this->fakeConnectiontypeData();
        $this->json('POST', '/api/v1/connectiontypes', $connectiontype);

        $this->assertApiResponse($connectiontype);
    }

    /**
     * @test
     */
    public function testReadConnectiontype()
    {
        $connectiontype = $this->makeConnectiontype();
        $this->json('GET', '/api/v1/connectiontypes/'.$connectiontype->id);

        $this->assertApiResponse($connectiontype->toArray());
    }

    /**
     * @test
     */
    public function testUpdateConnectiontype()
    {
        $connectiontype = $this->makeConnectiontype();
        $editedConnectiontype = $this->fakeConnectiontypeData();

        $this->json('PUT', '/api/v1/connectiontypes/'.$connectiontype->id, $editedConnectiontype);

        $this->assertApiResponse($editedConnectiontype);
    }

    /**
     * @test
     */
    public function testDeleteConnectiontype()
    {
        $connectiontype = $this->makeConnectiontype();
        $this->json('DELETE', '/api/v1/connectiontypes/'.$connectiontype->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/connectiontypes/'.$connectiontype->id);

        $this->assertResponseStatus(404);
    }
}
