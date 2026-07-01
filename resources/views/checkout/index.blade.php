@extends('layouts.main')

@section('title', 'Thanh Toán')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight mb-8">Thanh Toán & Đặt Hàng</h1>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Order Form -->
            <div class="w-full lg:w-2/3">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4">Thông tin người mua</h2>
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Họ và tên *</label>
                                <input type="text" name="name" required value="{{ Auth::user()->name ?? old('name') }}" class="mt-1 block w-full rounded-xl border-gray-300 py-3 px-4 border focus:ring-brand-500 focus:border-brand-500">
                                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Số điện thoại *</label>
                                <input type="tel" name="phone" required value="{{ old('phone') }}" class="mt-1 block w-full rounded-xl border-gray-300 py-3 px-4 border focus:ring-brand-500 focus:border-brand-500">
                                @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" value="{{ Auth::user()->email ?? old('email') }}" class="mt-1 block w-full rounded-xl border-gray-300 py-3 px-4 border focus:ring-brand-500 focus:border-brand-500">
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700">Địa chỉ giao hàng/thi công *</label>
                            <input type="text" name="address" required value="{{ old('address') }}" class="mt-1 block w-full rounded-xl border-gray-300 py-3 px-4 border focus:ring-brand-500 focus:border-brand-500">
                            @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700">Ghi chú thêm (Tuỳ chọn)</label>
                            <textarea name="note" rows="3" class="mt-1 block w-full rounded-xl border-gray-300 py-3 px-4 border focus:ring-brand-500 focus:border-brand-500">{{ old('note') }}</textarea>
                        </div>

                        <button type="submit" class="w-full py-4 px-4 bg-brand-600 text-white rounded-xl font-bold text-lg hover:bg-brand-700 transition-colors shadow-lg shadow-brand-500/30">
                            Xác Nhận Đặt Hàng
                        </button>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-3xl shadow-sm border border-brand-200 p-6 sticky top-28">
                    <h2 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Tóm tắt đơn hàng</h2>
                    
                    @foreach($cart as $item)
                    <div class="flex gap-4 mb-6">
                        <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                            @if($item['image'])
                                <img src="/storage/{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 line-clamp-2">{{ $item['name'] }}</h3>
                            <p class="text-sm text-gray-500 mt-1">Số lượng: {{ $item['quantity'] }}</p>
                            <p class="text-brand-600 font-bold mt-1">{{ number_format($item['price']) }} VNĐ</p>
                        </div>
                    </div>
                    @endforeach

                    <div class="border-t border-gray-100 pt-4 space-y-3">
                        <div class="flex justify-between text-gray-600">
                            <span>Tạm tính</span>
                            <span>{{ number_format($total) }} VNĐ</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Phí vận chuyển</span>
                            <span>Thỏa thuận</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold text-gray-900 border-t border-gray-100 pt-3">
                            <span>Tổng cộng</span>
                            <span class="text-brand-600">{{ number_format($total) }} VNĐ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
