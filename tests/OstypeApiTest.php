<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OstypeApiTest extends TestCase
{
    use MakeOstypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOstype()
    {
        $ostype = $this->fakeOstypeData();
        $this->json('POST', '/api/v1/ostypes', $ostype);

        $this->assertApiResponse($ostype);
    }

    /**
     * @test
     */
    public function testReadOstype()
    {
        $ostype = $this->makeOstype();
        $this->json('GET', '/api/v1/ostypes/'.$ostype->id);

        $this->assertApiResponse($ostype->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOstype()
    {
        $ostype = $this->makeOstype();
        $editedOstype = $this->fakeOstypeData();

        $this->json('PUT', '/api/v1/ostypes/'.$ostype->id, $editedOstype);

        $this->assertApiResponse($editedOstype);
    }

    /**
     * @test
     */
    public function testDeleteOstype()
    {
        $ostype = $this->makeOstype();
        $this->json('DELETE', '/api/v1/ostypes/'.$ostype->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ostypes/'.$ostype->id);

        $this->assertResponseStatus(404);
    }
}
