<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface
{
    public function createOrder(array $orderData, array $cartItems)
    {
        return DB::transaction(function () use ($orderData, $cartItems) {
            $order = Order::create($orderData);

            foreach ($cartItems as $id => $details) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'product_name' => $details['name'],
                    'price' => $details['price'],
                    'quantity' => $details['quantity'],
                    'total' => $details['price'] * $details['quantity'],
                ]);
                
                $product = Product::find($id);
                if ($product) {
                    $product->decrement('quantity', $details['quantity']);
                }
            }

            return $order;
        });
    }

    public function getUserOrders(int $userId)
    {
        return Order::where('user_id', $userId)->with('items')->latest()->get();
    }

    public function getOrderWithItems(int $orderId)
    {
        return Order::with('items')->findOrFail($orderId);
    }
}
