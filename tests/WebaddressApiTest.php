<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WebaddressApiTest extends TestCase
{
    use MakeWebaddressTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateWebaddress()
    {
        $webaddress = $this->fakeWebaddressData();
        $this->json('POST', '/api/v1/webaddresses', $webaddress);

        $this->assertApiResponse($webaddress);
    }

    /**
     * @test
     */
    public function testReadWebaddress()
    {
        $webaddress = $this->makeWebaddress();
        $this->json('GET', '/api/v1/webaddresses/'.$webaddress->id);

        $this->assertApiResponse($webaddress->toArray());
    }

    /**
     * @test
     */
    public function testUpdateWebaddress()
    {
        $webaddress = $this->makeWebaddress();
        $editedWebaddress = $this->fakeWebaddressData();

        $this->json('PUT', '/api/v1/webaddresses/'.$webaddress->id, $editedWebaddress);

        $this->assertApiResponse($editedWebaddress);
    }

    /**
     * @test
     */
    public function testDeleteWebaddress()
    {
        $webaddress = $this->makeWebaddress();
        $this->json('DELETE', '/api/v1/webaddresses/'.$webaddress->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/webaddresses/'.$webaddress->id);

        $this->assertResponseStatus(404);
    }
}
