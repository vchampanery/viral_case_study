<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
//        echo "<pre>";
//        var_dump($this);
//        exit;
        $response = $this->get('/');
//        $crawler = $this->client->request('GET', '/');
        $response->assertStatus(200);
    }
}
