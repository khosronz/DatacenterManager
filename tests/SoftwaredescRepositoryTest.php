<?php

use App\Models\Softwaredesc;
use App\Repositories\SoftwaredescRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SoftwaredescRepositoryTest extends TestCase
{
    use MakeSoftwaredescTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SoftwaredescRepository
     */
    protected $softwaredescRepo;

    public function setUp()
    {
        parent::setUp();
        $this->softwaredescRepo = App::make(SoftwaredescRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSoftwaredesc()
    {
        $softwaredesc = $this->fakeSoftwaredescData();
        $createdSoftwaredesc = $this->softwaredescRepo->create($softwaredesc);
        $createdSoftwaredesc = $createdSoftwaredesc->toArray();
        $this->assertArrayHasKey('id', $createdSoftwaredesc);
        $this->assertNotNull($createdSoftwaredesc['id'], 'Created Softwaredesc must have id specified');
        $this->assertNotNull(Softwaredesc::find($createdSoftwaredesc['id']), 'Softwaredesc with given id must be in DB');
        $this->assertModelData($softwaredesc, $createdSoftwaredesc);
    }

    /**
     * @test read
     */
    public function testReadSoftwaredesc()
    {
        $softwaredesc = $this->makeSoftwaredesc();
        $dbSoftwaredesc = $this->softwaredescRepo->find($softwaredesc->id);
        $dbSoftwaredesc = $dbSoftwaredesc->toArray();
        $this->assertModelData($softwaredesc->toArray(), $dbSoftwaredesc);
    }

    /**
     * @test update
     */
    public function testUpdateSoftwaredesc()
    {
        $softwaredesc = $this->makeSoftwaredesc();
        $fakeSoftwaredesc = $this->fakeSoftwaredescData();
        $updatedSoftwaredesc = $this->softwaredescRepo->update($fakeSoftwaredesc, $softwaredesc->id);
        $this->assertModelData($fakeSoftwaredesc, $updatedSoftwaredesc->toArray());
        $dbSoftwaredesc = $this->softwaredescRepo->find($softwaredesc->id);
        $this->assertModelData($fakeSoftwaredesc, $dbSoftwaredesc->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSoftwaredesc()
    {
        $softwaredesc = $this->makeSoftwaredesc();
        $resp = $this->softwaredescRepo->delete($softwaredesc->id);
        $this->assertTrue($resp);
        $this->assertNull(Softwaredesc::find($softwaredesc->id), 'Softwaredesc should not exist in DB');
    }
}
