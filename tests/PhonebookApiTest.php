<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PhonebookApiTest extends TestCase
{
    use MakePhonebookTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePhonebook()
    {
        $phonebook = $this->fakePhonebookData();
        $this->json('POST', '/api/v1/phonebooks', $phonebook);

        $this->assertApiResponse($phonebook);
    }

    /**
     * @test
     */
    public function testReadPhonebook()
    {
        $phonebook = $this->makePhonebook();
        $this->json('GET', '/api/v1/phonebooks/'.$phonebook->id);

        $this->assertApiResponse($phonebook->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePhonebook()
    {
        $phonebook = $this->makePhonebook();
        $editedPhonebook = $this->fakePhonebookData();

        $this->json('PUT', '/api/v1/phonebooks/'.$phonebook->id, $editedPhonebook);

        $this->assertApiResponse($editedPhonebook);
    }

    /**
     * @test
     */
    public function testDeletePhonebook()
    {
        $phonebook = $this->makePhonebook();
        $this->json('DELETE', '/api/v1/phonebooks/'.$phonebook->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/phonebooks/'.$phonebook->id);

        $this->assertResponseStatus(404);
    }
}
