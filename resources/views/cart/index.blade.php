@extends('layouts.main')

@section('title', 'Giỏ hàng của bạn')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-10 text-center tracking-tight">Giỏ Hàng Của Bạn</h1>

        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-4 rounded-2xl mb-8 flex items-start shadow-sm">
                <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(count($cart) > 0)
            <div class="bg-white shadow-xl shadow-gray-200/40 border border-gray-100 overflow-hidden rounded-3xl mb-8 relative">
                <!-- Background decor -->
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-brand-50 rounded-full blur-3xl opacity-50 pointer-events-none"></div>

                <ul class="divide-y divide-gray-100 relative z-10">
                    @foreach($cart as $id => $details)
                        <li class="p-6 sm:p-8 flex items-center hover:bg-gray-50/50 transition-colors">
                            <div class="flex-shrink-0 w-28 h-28 sm:w-32 sm:h-32 border border-gray-200 rounded-2xl overflow-hidden bg-gray-100 shadow-inner">
                                <img src="{{ $details['image'] ? '/storage/'.$details['image'] : 'https://via.placeholder.com/150' }}" alt="{{ $details['name'] }}" class="w-full h-full object-center object-cover">
                            </div>
                            <div class="ml-6 sm:ml-8 flex-1 flex flex-col justify-between">
                                <div class="flex flex-col sm:flex-row justify-between">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2 sm:mb-0">{{ $details['name'] }}</h3>
                                    <p class="text-xl font-extrabold text-brand-600 sm:ml-4 whitespace-nowrap">{{ number_format($details['price']) }} VNĐ</p>
                                </div>
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mt-4 sm:mt-6">
                                    <form action="{{ route('cart.update') }}" method="POST" class="flex items-center space-x-2 bg-gray-100 p-1.5 rounded-xl mb-4 sm:mb-0">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <label for="quantity-{{ $id }}" class="sr-only">Số lượng</label>
                                        <input type="number" id="quantity-{{ $id }}" name="quantity" value="{{ $details['quantity'] }}" min="1" class="w-16 h-8 text-center text-sm font-bold text-gray-900 border-none bg-white rounded-lg focus:ring-2 focus:ring-brand-500">
                                        <button type="submit" class="p-1.5 text-brand-600 hover:text-brand-800 bg-white rounded-lg shadow-sm hover:shadow transition-all" title="Cập nhật">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit" class="inline-flex items-center text-sm font-medium text-red-500 hover:text-red-700 hover:bg-red-50 px-4 py-2 rounded-xl transition-all">
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            Xóa khỏi giỏ
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="bg-gray-50/80 backdrop-blur p-6 sm:p-8 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4 relative z-10">
                    <span class="text-xl font-bold text-gray-700">Tổng Thanh Toán:</span>
                    <span class="text-3xl font-black text-brand-600">{{ number_format($total) }} VNĐ</span>
                </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-between items-center gap-6">
                <a href="{{ route('products.index') }}" class="text-gray-500 font-medium hover:text-brand-600 flex items-center transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Tiếp tục mua sắm
                </a>
                <a href="{{ route('checkout.index') }}" class="w-full sm:w-auto bg-brand-600 border border-transparent rounded-2xl py-4 px-10 flex items-center justify-center text-lg font-bold text-white hover:bg-brand-700 shadow-lg shadow-brand-500/30 transition-all transform hover:-translate-y-1">
                    Tiến Hành Đặt Hàng
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        @else
            <div class="text-center py-24 bg-white rounded-3xl shadow-sm border border-gray-100">
                <div class="w-24 h-24 bg-brand-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="h-12 w-12 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Giỏ hàng của bạn đang trống</h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto">Có vẻ như bạn chưa chọn sản phẩm nào. Hãy khám phá các dòng máy chất lượng cao của chúng tôi!</p>
                
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-8 py-4 border border-transparent shadow-lg shadow-brand-500/30 text-base font-bold rounded-full text-white bg-brand-600 hover:bg-brand-700 transition-all transform hover:-translate-y-1">
                    Khám phá sản phẩm
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
