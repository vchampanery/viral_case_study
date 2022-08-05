<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ProductTest extends TestCase
{
     use RefreshDatabase;
    
    protected  $user;

    public function setUp():void
    {
        parent::setUp();
        
        $this->user =User::factory()->create();
        $this->actingAs($this->user,'sanctum') ;
        
    }
    public function test_can_create_product()
    {
        $formdata = [
            'User'=>1,
            'Name'=>"123",
            'Price'=>12,
            'Category'=>1,
            'Description'=>"123",
            'Avatar'=>"123",
        ];
        $this->withoutExceptionHandling();
        $this->json('POST',route('products.store'),$formdata)
            ->assertStatus(200)
            ->assertJson($formdata);
    }
    public function test_can_show_product()
    {
         $this->get(route('products.index'))
            ->assertStatus(200);
    }
    public function test_can_destroy_product()
    {
         $this->get(route('products.destroy',1))
            ->assertStatus(200);
    }
}
