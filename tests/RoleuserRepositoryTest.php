<?php

use App\Models\Roleuser;
use App\Repositories\RoleuserRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleuserRepositoryTest extends TestCase
{
    use MakeRoleuserTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RoleuserRepository
     */
    protected $roleuserRepo;

    public function setUp()
    {
        parent::setUp();
        $this->roleuserRepo = App::make(RoleuserRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRoleuser()
    {
        $roleuser = $this->fakeRoleuserData();
        $createdRoleuser = $this->roleuserRepo->create($roleuser);
        $createdRoleuser = $createdRoleuser->toArray();
        $this->assertArrayHasKey('id', $createdRoleuser);
        $this->assertNotNull($createdRoleuser['id'], 'Created Roleuser must have id specified');
        $this->assertNotNull(Roleuser::find($createdRoleuser['id']), 'Roleuser with given id must be in DB');
        $this->assertModelData($roleuser, $createdRoleuser);
    }

    /**
     * @test read
     */
    public function testReadRoleuser()
    {
        $roleuser = $this->makeRoleuser();
        $dbRoleuser = $this->roleuserRepo->find($roleuser->id);
        $dbRoleuser = $dbRoleuser->toArray();
        $this->assertModelData($roleuser->toArray(), $dbRoleuser);
    }

    /**
     * @test update
     */
    public function testUpdateRoleuser()
    {
        $roleuser = $this->makeRoleuser();
        $fakeRoleuser = $this->fakeRoleuserData();
        $updatedRoleuser = $this->roleuserRepo->update($fakeRoleuser, $roleuser->id);
        $this->assertModelData($fakeRoleuser, $updatedRoleuser->toArray());
        $dbRoleuser = $this->roleuserRepo->find($roleuser->id);
        $this->assertModelData($fakeRoleuser, $dbRoleuser->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRoleuser()
    {
        $roleuser = $this->makeRoleuser();
        $resp = $this->roleuserRepo->delete($roleuser->id);
        $this->assertTrue($resp);
        $this->assertNull(Roleuser::find($roleuser->id), 'Roleuser should not exist in DB');
    }
}
