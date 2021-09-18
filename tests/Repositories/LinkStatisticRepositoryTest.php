<?php namespace Tests\Repositories;

use App\Models\LinkStatistic;
use App\Repositories\LinkStatisticRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LinkStatisticRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LinkStatisticRepository
     */
    protected $linkStatisticRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->linkStatisticRepo = \App::make(LinkStatisticRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_link_statistic()
    {
        $linkStatistic = LinkStatistic::factory()->make()->toArray();

        $createdLinkStatistic = $this->linkStatisticRepo->create($linkStatistic);

        $createdLinkStatistic = $createdLinkStatistic->toArray();
        $this->assertArrayHasKey('id', $createdLinkStatistic);
        $this->assertNotNull($createdLinkStatistic['id'], 'Created LinkStatistic must have id specified');
        $this->assertNotNull(LinkStatistic::find($createdLinkStatistic['id']), 'LinkStatistic with given id must be in DB');
        $this->assertModelData($linkStatistic, $createdLinkStatistic);
    }

    /**
     * @test read
     */
    public function test_read_link_statistic()
    {
        $linkStatistic = LinkStatistic::factory()->create();

        $dbLinkStatistic = $this->linkStatisticRepo->find($linkStatistic->id);

        $dbLinkStatistic = $dbLinkStatistic->toArray();
        $this->assertModelData($linkStatistic->toArray(), $dbLinkStatistic);
    }

    /**
     * @test update
     */
    public function test_update_link_statistic()
    {
        $linkStatistic = LinkStatistic::factory()->create();
        $fakeLinkStatistic = LinkStatistic::factory()->make()->toArray();

        $updatedLinkStatistic = $this->linkStatisticRepo->update($fakeLinkStatistic, $linkStatistic->id);

        $this->assertModelData($fakeLinkStatistic, $updatedLinkStatistic->toArray());
        $dbLinkStatistic = $this->linkStatisticRepo->find($linkStatistic->id);
        $this->assertModelData($fakeLinkStatistic, $dbLinkStatistic->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_link_statistic()
    {
        $linkStatistic = LinkStatistic::factory()->create();

        $resp = $this->linkStatisticRepo->delete($linkStatistic->id);

        $this->assertTrue($resp);
        $this->assertNull(LinkStatistic::find($linkStatistic->id), 'LinkStatistic should not exist in DB');
    }
}
