<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleuserApiTest extends TestCase
{
    use MakeRoleuserTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRoleuser()
    {
        $roleuser = $this->fakeRoleuserData();
        $this->json('POST', '/api/v1/roleusers', $roleuser);

        $this->assertApiResponse($roleuser);
    }

    /**
     * @test
     */
    public function testReadRoleuser()
    {
        $roleuser = $this->makeRoleuser();
        $this->json('GET', '/api/v1/roleusers/'.$roleuser->id);

        $this->assertApiResponse($roleuser->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRoleuser()
    {
        $roleuser = $this->makeRoleuser();
        $editedRoleuser = $this->fakeRoleuserData();

        $this->json('PUT', '/api/v1/roleusers/'.$roleuser->id, $editedRoleuser);

        $this->assertApiResponse($editedRoleuser);
    }

    /**
     * @test
     */
    public function testDeleteRoleuser()
    {
        $roleuser = $this->makeRoleuser();
        $this->json('DELETE', '/api/v1/roleusers/'.$roleuser->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/roleusers/'.$roleuser->id);

        $this->assertResponseStatus(404);
    }
}
