<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    public function test_create(){
        $response = $this->post('/l/create', ['target' => 'https://laravel.com']);
        $response->assertStatus(200);
    }

    public function test_go_url(){
      $response = $this->postJson('/l/create', ['target' => 'https://laravel.com']);
    // $link = $response->getData()->target;
      $response->assertJsonFragment(['target' => 'https://laravel.com']);
    }

    public function test_invalidate_and_go(){
      $response = $this->postJson('/l/create', ['target' => 'https://laravel.com']);
      $link = $response->getData()->link;
      $response = $this->get($link);
      $response->assertStatus(200);
      $response = $this->put($link);
      $response->assertStatus(200);
      $response = $this->get($link);
      $response->assertStatus(404);
    }

    public function test_create_expirated(){
      $response = $this->postJson('/l/create', ['target' => 'https://laravel.com', 'expiration_date' => '09/17/2021']);
      $link = $response->getData()->link;
      $response = $this->get($link);
      $response->assertStatus(404);
    }

  public function test_create_password() {
    $response = $this->postJson('/l/create', ['target' => 'https://laravel.com', 'password' => '123456']);
    $response->assertJsonFragment(['target' => 'https://laravel.com']);
    $response->assertJsonFragment(['password' => '123456']);
    $link = $response->getData()->link;
    $response->assertJsonFragment(['https://laravel.com?password=123456']);
    $response = $this->get($link);
    $response->assertStatus(200);
  }
}
