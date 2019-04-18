<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PhonetypeApiTest extends TestCase
{
    use MakePhonetypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePhonetype()
    {
        $phonetype = $this->fakePhonetypeData();
        $this->json('POST', '/api/v1/phonetypes', $phonetype);

        $this->assertApiResponse($phonetype);
    }

    /**
     * @test
     */
    public function testReadPhonetype()
    {
        $phonetype = $this->makePhonetype();
        $this->json('GET', '/api/v1/phonetypes/'.$phonetype->id);

        $this->assertApiResponse($phonetype->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePhonetype()
    {
        $phonetype = $this->makePhonetype();
        $editedPhonetype = $this->fakePhonetypeData();

        $this->json('PUT', '/api/v1/phonetypes/'.$phonetype->id, $editedPhonetype);

        $this->assertApiResponse($editedPhonetype);
    }

    /**
     * @test
     */
    public function testDeletePhonetype()
    {
        $phonetype = $this->makePhonetype();
        $this->json('DELETE', '/api/v1/phonetypes/'.$phonetype->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/phonetypes/'.$phonetype->id);

        $this->assertResponseStatus(404);
    }
}
