<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    protected $orderHandler;

    public function __construct(\App\Handlers\OrderHandler $orderHandler)
    {
        $this->orderHandler = $orderHandler;
    }

    public function index()
    {
        $orders = $this->orderHandler->getUserOrders();
        return view('orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order = $this->orderHandler->getOrderWithItemsForUser($orderId);
        return view('orders.show', compact('order'));
    }
}
