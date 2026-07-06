<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_paginated_products()
    {
        $category = Category::factory()->create();
        Product::factory()->count(15)->create([
            'category_id' => $category->id,
            'is_active' => true,
        ]);

        $response = $this->getJson('/api/v1/products');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'message',
                     'data' => [
                         'data', // the array of items
                         'current_page',
                         'last_page',
                         'total'
                     ]
                 ]);
        
        $this->assertCount(12, $response->json('data.data'), 'Default pagination is 12');
    }

    public function test_can_get_product_detail()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create([
            'category_id' => $category->id,
            'is_active' => true,
            'price' => 1000000
        ]);

        $response = $this->getJson('/api/v1/products/' . $product->id);

        $response->assertStatus(200)
                 ->assertJsonPath('data.id', $product->id)
                 ->assertJsonPath('data.name', $product->name)
                 ->assertJsonPath('data.price', "1000000");
    }
}
