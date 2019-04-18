<?php

use App\Models\Phonebook;
use App\Repositories\PhonebookRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PhonebookRepositoryTest extends TestCase
{
    use MakePhonebookTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PhonebookRepository
     */
    protected $phonebookRepo;

    public function setUp()
    {
        parent::setUp();
        $this->phonebookRepo = App::make(PhonebookRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePhonebook()
    {
        $phonebook = $this->fakePhonebookData();
        $createdPhonebook = $this->phonebookRepo->create($phonebook);
        $createdPhonebook = $createdPhonebook->toArray();
        $this->assertArrayHasKey('id', $createdPhonebook);
        $this->assertNotNull($createdPhonebook['id'], 'Created Phonebook must have id specified');
        $this->assertNotNull(Phonebook::find($createdPhonebook['id']), 'Phonebook with given id must be in DB');
        $this->assertModelData($phonebook, $createdPhonebook);
    }

    /**
     * @test read
     */
    public function testReadPhonebook()
    {
        $phonebook = $this->makePhonebook();
        $dbPhonebook = $this->phonebookRepo->find($phonebook->id);
        $dbPhonebook = $dbPhonebook->toArray();
        $this->assertModelData($phonebook->toArray(), $dbPhonebook);
    }

    /**
     * @test update
     */
    public function testUpdatePhonebook()
    {
        $phonebook = $this->makePhonebook();
        $fakePhonebook = $this->fakePhonebookData();
        $updatedPhonebook = $this->phonebookRepo->update($fakePhonebook, $phonebook->id);
        $this->assertModelData($fakePhonebook, $updatedPhonebook->toArray());
        $dbPhonebook = $this->phonebookRepo->find($phonebook->id);
        $this->assertModelData($fakePhonebook, $dbPhonebook->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePhonebook()
    {
        $phonebook = $this->makePhonebook();
        $resp = $this->phonebookRepo->delete($phonebook->id);
        $this->assertTrue($resp);
        $this->assertNull(Phonebook::find($phonebook->id), 'Phonebook should not exist in DB');
    }
}
