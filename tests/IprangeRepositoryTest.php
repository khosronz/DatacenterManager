<?php

use App\Models\Iprange;
use App\Repositories\IprangeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IprangeRepositoryTest extends TestCase
{
    use MakeIprangeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var IprangeRepository
     */
    protected $iprangeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->iprangeRepo = App::make(IprangeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateIprange()
    {
        $iprange = $this->fakeIprangeData();
        $createdIprange = $this->iprangeRepo->create($iprange);
        $createdIprange = $createdIprange->toArray();
        $this->assertArrayHasKey('id', $createdIprange);
        $this->assertNotNull($createdIprange['id'], 'Created Iprange must have id specified');
        $this->assertNotNull(Iprange::find($createdIprange['id']), 'Iprange with given id must be in DB');
        $this->assertModelData($iprange, $createdIprange);
    }

    /**
     * @test read
     */
    public function testReadIprange()
    {
        $iprange = $this->makeIprange();
        $dbIprange = $this->iprangeRepo->find($iprange->id);
        $dbIprange = $dbIprange->toArray();
        $this->assertModelData($iprange->toArray(), $dbIprange);
    }

    /**
     * @test update
     */
    public function testUpdateIprange()
    {
        $iprange = $this->makeIprange();
        $fakeIprange = $this->fakeIprangeData();
        $updatedIprange = $this->iprangeRepo->update($fakeIprange, $iprange->id);
        $this->assertModelData($fakeIprange, $updatedIprange->toArray());
        $dbIprange = $this->iprangeRepo->find($iprange->id);
        $this->assertModelData($fakeIprange, $dbIprange->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteIprange()
    {
        $iprange = $this->makeIprange();
        $resp = $this->iprangeRepo->delete($iprange->id);
        $this->assertTrue($resp);
        $this->assertNull(Iprange::find($iprange->id), 'Iprange should not exist in DB');
    }
}
