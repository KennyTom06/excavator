<?php

namespace App\Handlers;

use App\Repositories\Contracts\ProductRepositoryInterface;

class CartHandler
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getCartData()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return ['cart' => $cart, 'total' => $total];
    }

    public function addToCart(string $slug, int $quantity = 1)
    {
        $product = $this->productRepository->findBySlug($slug);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => $quantity,
                'price' => $product->price ?? 0,
                'image' => $product->image
            ];
        }

        session()->put('cart', $cart);
    }

    public function updateCart(int $id, int $quantity)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, $quantity);
            session()->put('cart', $cart);
        }
    }

    public function removeFromCart(int $id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    }
}
