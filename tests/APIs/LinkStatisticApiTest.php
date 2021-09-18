<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\LinkStatistic;

class LinkStatisticApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_link_statistic()
    {
        $linkStatistic = LinkStatistic::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/link_statistics', $linkStatistic
        );

        $this->assertApiResponse($linkStatistic);
    }

    /**
     * @test
     */
    public function test_read_link_statistic()
    {
        $linkStatistic = LinkStatistic::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/link_statistics/'.$linkStatistic->id
        );

        $this->assertApiResponse($linkStatistic->toArray());
    }

    /**
     * @test
     */
    public function test_update_link_statistic()
    {
        $linkStatistic = LinkStatistic::factory()->create();
        $editedLinkStatistic = LinkStatistic::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/link_statistics/'.$linkStatistic->id,
            $editedLinkStatistic
        );

        $this->assertApiResponse($editedLinkStatistic);
    }

    /**
     * @test
     */
    public function test_delete_link_statistic()
    {
        $linkStatistic = LinkStatistic::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/link_statistics/'.$linkStatistic->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/link_statistics/'.$linkStatistic->id
        );

        $this->response->assertStatus(404);
    }
}
