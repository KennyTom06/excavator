<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    protected $orderHandler;
    protected $cartHandler;

    public function __construct(
        \App\Handlers\OrderHandler $orderHandler,
        \App\Handlers\CartHandler $cartHandler
    ) {
        $this->orderHandler = $orderHandler;
        $this->cartHandler = $cartHandler;
    }

    public function index()
    {
        $data = $this->cartHandler->getCartData();
        if (empty($data['cart'])) {
            return redirect()->route('cart.index')->withErrors(['cart' => 'Giỏ hàng của bạn đang trống!']);
        }
        
        return view('checkout.index', $data);
    }

    public function store(Request $request)
    {
        $data = $this->cartHandler->getCartData();
        if (empty($data['cart'])) {
            return redirect()->route('cart.index')->withErrors(['cart' => 'Giỏ hàng của bạn đang trống!']);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $order = $this->orderHandler->createOrderFromCart($validated, $data['cart'], $data['total']);

        session()->forget('cart');

        return redirect()->route('checkout.success', $order->id);
    }

    public function success($orderId)
    {
        $order = \App\Models\Order::findOrFail($orderId);
        return view('checkout.success', compact('order'));
    }
}
