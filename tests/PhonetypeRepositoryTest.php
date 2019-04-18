<?php

use App\Models\Phonetype;
use App\Repositories\PhonetypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PhonetypeRepositoryTest extends TestCase
{
    use MakePhonetypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PhonetypeRepository
     */
    protected $phonetypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->phonetypeRepo = App::make(PhonetypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePhonetype()
    {
        $phonetype = $this->fakePhonetypeData();
        $createdPhonetype = $this->phonetypeRepo->create($phonetype);
        $createdPhonetype = $createdPhonetype->toArray();
        $this->assertArrayHasKey('id', $createdPhonetype);
        $this->assertNotNull($createdPhonetype['id'], 'Created Phonetype must have id specified');
        $this->assertNotNull(Phonetype::find($createdPhonetype['id']), 'Phonetype with given id must be in DB');
        $this->assertModelData($phonetype, $createdPhonetype);
    }

    /**
     * @test read
     */
    public function testReadPhonetype()
    {
        $phonetype = $this->makePhonetype();
        $dbPhonetype = $this->phonetypeRepo->find($phonetype->id);
        $dbPhonetype = $dbPhonetype->toArray();
        $this->assertModelData($phonetype->toArray(), $dbPhonetype);
    }

    /**
     * @test update
     */
    public function testUpdatePhonetype()
    {
        $phonetype = $this->makePhonetype();
        $fakePhonetype = $this->fakePhonetypeData();
        $updatedPhonetype = $this->phonetypeRepo->update($fakePhonetype, $phonetype->id);
        $this->assertModelData($fakePhonetype, $updatedPhonetype->toArray());
        $dbPhonetype = $this->phonetypeRepo->find($phonetype->id);
        $this->assertModelData($fakePhonetype, $dbPhonetype->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePhonetype()
    {
        $phonetype = $this->makePhonetype();
        $resp = $this->phonetypeRepo->delete($phonetype->id);
        $this->assertTrue($resp);
        $this->assertNull(Phonetype::find($phonetype->id), 'Phonetype should not exist in DB');
    }
}
