<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IprangeApiTest extends TestCase
{
    use MakeIprangeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateIprange()
    {
        $iprange = $this->fakeIprangeData();
        $this->json('POST', '/api/v1/ipranges', $iprange);

        $this->assertApiResponse($iprange);
    }

    /**
     * @test
     */
    public function testReadIprange()
    {
        $iprange = $this->makeIprange();
        $this->json('GET', '/api/v1/ipranges/'.$iprange->id);

        $this->assertApiResponse($iprange->toArray());
    }

    /**
     * @test
     */
    public function testUpdateIprange()
    {
        $iprange = $this->makeIprange();
        $editedIprange = $this->fakeIprangeData();

        $this->json('PUT', '/api/v1/ipranges/'.$iprange->id, $editedIprange);

        $this->assertApiResponse($editedIprange);
    }

    /**
     * @test
     */
    public function testDeleteIprange()
    {
        $iprange = $this->makeIprange();
        $this->json('DELETE', '/api/v1/ipranges/'.$iprange->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ipranges/'.$iprange->id);

        $this->assertResponseStatus(404);
    }
}
