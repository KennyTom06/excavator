<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartHandler;

    public function __construct(\App\Handlers\CartHandler $cartHandler)
    {
        $this->cartHandler = $cartHandler;
    }

    public function index()
    {
        $data = $this->cartHandler->getCartData();
        return view('cart.index', $data);
    }

    public function add(Request $request)
    {
        $quantity = $request->input('quantity', 1);
        $this->cartHandler->addToCart($request->slug, $quantity);
        return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $this->cartHandler->updateCart($request->id, $request->quantity);
            return redirect()->route('cart.index')->with('success', 'Đã cập nhật giỏ hàng!');
        }
        return redirect()->back();
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $this->cartHandler->removeFromCart($request->id);
            return redirect()->route('cart.index')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
        }
        return redirect()->back();
    }
}
