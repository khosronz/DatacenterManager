<?php

use App\Models\Domain;
use App\Repositories\DomainRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DomainRepositoryTest extends TestCase
{
    use MakeDomainTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DomainRepository
     */
    protected $domainRepo;

    public function setUp()
    {
        parent::setUp();
        $this->domainRepo = App::make(DomainRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDomain()
    {
        $domain = $this->fakeDomainData();
        $createdDomain = $this->domainRepo->create($domain);
        $createdDomain = $createdDomain->toArray();
        $this->assertArrayHasKey('id', $createdDomain);
        $this->assertNotNull($createdDomain['id'], 'Created Domain must have id specified');
        $this->assertNotNull(Domain::find($createdDomain['id']), 'Domain with given id must be in DB');
        $this->assertModelData($domain, $createdDomain);
    }

    /**
     * @test read
     */
    public function testReadDomain()
    {
        $domain = $this->makeDomain();
        $dbDomain = $this->domainRepo->find($domain->id);
        $dbDomain = $dbDomain->toArray();
        $this->assertModelData($domain->toArray(), $dbDomain);
    }

    /**
     * @test update
     */
    public function testUpdateDomain()
    {
        $domain = $this->makeDomain();
        $fakeDomain = $this->fakeDomainData();
        $updatedDomain = $this->domainRepo->update($fakeDomain, $domain->id);
        $this->assertModelData($fakeDomain, $updatedDomain->toArray());
        $dbDomain = $this->domainRepo->find($domain->id);
        $this->assertModelData($fakeDomain, $dbDomain->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDomain()
    {
        $domain = $this->makeDomain();
        $resp = $this->domainRepo->delete($domain->id);
        $this->assertTrue($resp);
        $this->assertNull(Domain::find($domain->id), 'Domain should not exist in DB');
    }
}
