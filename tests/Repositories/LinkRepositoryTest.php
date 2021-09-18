<?php namespace Tests\Repositories;

use App\Models\Link;
use App\Repositories\LinkRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LinkRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LinkRepository
     */
    protected $linkRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->linkRepo = \App::make(LinkRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_link()
    {
        $link = Link::factory()->make()->toArray();

        $createdLink = $this->linkRepo->create($link);

        $createdLink = $createdLink->toArray();
        $this->assertArrayHasKey('id', $createdLink);
        $this->assertNotNull($createdLink['id'], 'Created Link must have id specified');
        $this->assertNotNull(Link::find($createdLink['id']), 'Link with given id must be in DB');
        $this->assertModelData($link, $createdLink);
    }

    /**
     * @test read
     */
    public function test_read_link()
    {
        $link = Link::factory()->create();

        $dbLink = $this->linkRepo->find($link->id);

        $dbLink = $dbLink->toArray();
        $this->assertModelData($link->toArray(), $dbLink);
    }

    /**
     * @test update
     */
    public function test_update_link()
    {
        $link = Link::factory()->create();
        $fakeLink = Link::factory()->make()->toArray();

        $updatedLink = $this->linkRepo->update($fakeLink, $link->id);

        $this->assertModelData($fakeLink, $updatedLink->toArray());
        $dbLink = $this->linkRepo->find($link->id);
        $this->assertModelData($fakeLink, $dbLink->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_link()
    {
        $link = Link::factory()->create();

        $resp = $this->linkRepo->delete($link->id);

        $this->assertTrue($resp);
        $this->assertNull(Link::find($link->id), 'Link should not exist in DB');
    }
}
