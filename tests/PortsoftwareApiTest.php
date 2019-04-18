<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PortsoftwareApiTest extends TestCase
{
    use MakePortsoftwareTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePortsoftware()
    {
        $portsoftware = $this->fakePortsoftwareData();
        $this->json('POST', '/api/v1/portsoftwares', $portsoftware);

        $this->assertApiResponse($portsoftware);
    }

    /**
     * @test
     */
    public function testReadPortsoftware()
    {
        $portsoftware = $this->makePortsoftware();
        $this->json('GET', '/api/v1/portsoftwares/'.$portsoftware->id);

        $this->assertApiResponse($portsoftware->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePortsoftware()
    {
        $portsoftware = $this->makePortsoftware();
        $editedPortsoftware = $this->fakePortsoftwareData();

        $this->json('PUT', '/api/v1/portsoftwares/'.$portsoftware->id, $editedPortsoftware);

        $this->assertApiResponse($editedPortsoftware);
    }

    /**
     * @test
     */
    public function testDeletePortsoftware()
    {
        $portsoftware = $this->makePortsoftware();
        $this->json('DELETE', '/api/v1/portsoftwares/'.$portsoftware->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/portsoftwares/'.$portsoftware->id);

        $this->assertResponseStatus(404);
    }
}
