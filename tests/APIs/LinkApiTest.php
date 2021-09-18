<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Link;

class LinkApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_link()
    {
        $link = Link::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/links', $link
        );

        $this->assertApiResponse($link);
    }

    /**
     * @test
     */
    public function test_read_link()
    {
        $link = Link::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/links/'.$link->id
        );

        $this->assertApiResponse($link->toArray());
    }

    /**
     * @test
     */
    public function test_update_link()
    {
        $link = Link::factory()->create();
        $editedLink = Link::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/links/'.$link->id,
            $editedLink
        );

        $this->assertApiResponse($editedLink);
    }

    /**
     * @test
     */
    public function test_delete_link()
    {
        $link = Link::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/links/'.$link->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/links/'.$link->id
        );

        $this->response->assertStatus(404);
    }
}
