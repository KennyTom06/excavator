<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createOrder(array $orderData, array $cartItems);
    public function getUserOrders(int $userId);
    public function getOrderWithItems(int $orderId);
}
