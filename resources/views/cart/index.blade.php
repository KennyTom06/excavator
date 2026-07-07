@extends('layouts.main')

@section('title', 'Giỏ hàng của bạn')
{{--//them 1 dong de thu--}}
@section('content')
<div class="bg-gray-50 py-12 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Giỏ Hàng Của Bạn</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(count($cart) > 0)
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                <ul class="divide-y divide-gray-200">
                    @foreach($cart as $id => $details)
                        <li class="p-6 flex items-center">
                            <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                <img src="{{ $details['image'] ? '/storage/'.$details['image'] : 'https://via.placeholder.com/150' }}" alt="{{ $details['name'] }}" class="w-full h-full object-center object-cover">
                            </div>
                            <div class="ml-6 flex-1 flex flex-col">
                                <div class="flex justify-between">
                                    <h3 class="text-lg font-medium text-gray-900">{{ $details['name'] }}</h3>
                                    <p class="ml-4 text-lg font-medium text-brand-600">{{ number_format($details['price']) }} VNĐ</p>
                                </div>
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end mt-4 gap-4">
                                    <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <label for="qty-{{ $id }}" class="text-sm font-medium text-gray-700">Số lượng:</label>
                                        <input type="number" id="qty-{{ $id }}" name="quantity" value="{{ $details['quantity'] }}" min="1" class="w-20 border-gray-300 rounded-md shadow-sm focus:border-brand-500 focus:ring-brand-500 sm:text-sm text-center">
                                        <button type="submit" class="bg-primary hover:bg-primary-container text-white text-sm font-bold px-4 py-2 rounded-md shadow-sm transition-colors border border-transparent">
                                            Cập nhật
                                        </button>
                                    </form>

                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit" class="text-sm font-medium text-error hover:text-on-error-container underline p-2">Xóa</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="bg-gray-50 p-6 border-t border-gray-200 flex justify-between items-center">
                    <span class="text-xl font-medium text-gray-900">Tổng cộng:</span>
                    <span class="text-2xl font-extrabold text-brand-600">{{ number_format($total) }} VNĐ</span>
                </div>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('products.index') }}" class="text-brand-600 font-medium hover:text-brand-500">
                    &larr; Tiếp tục mua sắm
                </a>
                <a href="{{ route('checkout.index') }}" class="bg-brand-600 border border-transparent rounded-full py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-brand-700 shadow-lg transition-all">
                    Tiến hành Thanh toán
                </a>
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-xl shadow-sm border border-gray-100">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Giỏ hàng trống</h3>
                <p class="mt-1 text-sm text-gray-500">Bạn chưa có sản phẩm nào trong giỏ hàng.</p>
                <div class="mt-6">
                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-brand-600 hover:bg-brand-700">
                        Xem sản phẩm ngay
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
