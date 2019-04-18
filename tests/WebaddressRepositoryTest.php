<?php

use App\Models\Webaddress;
use App\Repositories\WebaddressRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WebaddressRepositoryTest extends TestCase
{
    use MakeWebaddressTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var WebaddressRepository
     */
    protected $webaddressRepo;

    public function setUp()
    {
        parent::setUp();
        $this->webaddressRepo = App::make(WebaddressRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateWebaddress()
    {
        $webaddress = $this->fakeWebaddressData();
        $createdWebaddress = $this->webaddressRepo->create($webaddress);
        $createdWebaddress = $createdWebaddress->toArray();
        $this->assertArrayHasKey('id', $createdWebaddress);
        $this->assertNotNull($createdWebaddress['id'], 'Created Webaddress must have id specified');
        $this->assertNotNull(Webaddress::find($createdWebaddress['id']), 'Webaddress with given id must be in DB');
        $this->assertModelData($webaddress, $createdWebaddress);
    }

    /**
     * @test read
     */
    public function testReadWebaddress()
    {
        $webaddress = $this->makeWebaddress();
        $dbWebaddress = $this->webaddressRepo->find($webaddress->id);
        $dbWebaddress = $dbWebaddress->toArray();
        $this->assertModelData($webaddress->toArray(), $dbWebaddress);
    }

    /**
     * @test update
     */
    public function testUpdateWebaddress()
    {
        $webaddress = $this->makeWebaddress();
        $fakeWebaddress = $this->fakeWebaddressData();
        $updatedWebaddress = $this->webaddressRepo->update($fakeWebaddress, $webaddress->id);
        $this->assertModelData($fakeWebaddress, $updatedWebaddress->toArray());
        $dbWebaddress = $this->webaddressRepo->find($webaddress->id);
        $this->assertModelData($fakeWebaddress, $dbWebaddress->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteWebaddress()
    {
        $webaddress = $this->makeWebaddress();
        $resp = $this->webaddressRepo->delete($webaddress->id);
        $this->assertTrue($resp);
        $this->assertNull(Webaddress::find($webaddress->id), 'Webaddress should not exist in DB');
    }
}
