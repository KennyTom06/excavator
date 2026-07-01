<?php

namespace App\Handlers;

use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class OrderHandler
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function createOrderFromCart(array $validatedData, array $cartItems, float $totalAmount)
    {
        $orderData = [
            'user_id' => Auth::id(),
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'] ?? null,
            'address' => $validatedData['address'],
            'note' => $validatedData['note'] ?? null,
            'total_amount' => $totalAmount,
            'status' => 'pending',
        ];

        return $this->orderRepository->createOrder($orderData, $cartItems);
    }

    public function getUserOrders()
    {
        return $this->orderRepository->getUserOrders(Auth::id());
    }

    public function getOrderWithItemsForUser(int $orderId)
    {
        $order = $this->orderRepository->getOrderWithItems($orderId);
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        return $order;
    }
}
