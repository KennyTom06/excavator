<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_create_order()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create([
            'category_id' => $category->id,
            'price' => 500000,
            'is_active' => true
        ]);

        $orderData = [
            'customer_name' => 'John Doe',
            'customer_phone' => '0912345678',
            'customer_email' => 'john@example.com',
            'shipping_address' => '123 Main St',
            'notes' => 'Test order',
            'items' => [
                [
                    'product_id' => $product->id,
                    'quantity' => 2
                ]
            ]
        ];

        $response = $this->postJson('/api/v1/orders', $orderData);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'status',
                     'message',
                     'data' => [
                         'id',
                         'order_code',
                         'total_amount'
                     ]
                 ]);

        // 2 items * 500000 = 1000000
        $response->assertJsonPath('data.total_amount', 1000000);

        $this->assertDatabaseHas('orders', [
            'customer_name' => 'John Doe',
            'customer_email' => 'john@example.com'
        ]);

        $this->assertDatabaseHas('order_items', [
            'product_id' => $product->id,
            'quantity' => 2,
            'unit_price' => 500000,
            'total_price' => 1000000
        ]);
    }
}
