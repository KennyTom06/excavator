@extends('layouts.main')

@section('title', 'Thanh Toán')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Thanh Toán & Đặt Hàng</h1>
            <p class="mt-4 text-lg text-gray-500">Hoàn tất thông tin để chúng tôi có thể liên hệ và giao hàng cho bạn nhanh nhất.</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Order Form -->
            <div class="w-full lg:w-2/3">
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-gray-100 p-8 sm:p-10 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-brand-50 rounded-full blur-3xl opacity-60 -mr-10 -mt-10 pointer-events-none"></div>
                    
                    <div class="flex items-center mb-8 border-b border-gray-100 pb-6 relative z-10">
                        <div class="w-12 h-12 rounded-2xl bg-brand-50 flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Thông tin người mua</h2>
                    </div>

                    <form action="{{ route('checkout.store') }}" method="POST" class="relative z-10">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-gray-700">Họ và tên *</label>
                                <input type="text" name="name" required value="{{ Auth::user()->name ?? old('name') }}" class="block w-full rounded-2xl border-gray-300 py-3.5 px-4 focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all border bg-gray-50/50 focus:bg-white text-gray-900 shadow-sm" placeholder="Nhập họ và tên">
                                @error('name') <span class="text-red-500 text-xs font-medium">{{ $message }}</span> @enderror
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-gray-700">Số điện thoại *</label>
                                <input type="tel" name="phone" required value="{{ old('phone') }}" class="block w-full rounded-2xl border-gray-300 py-3.5 px-4 focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all border bg-gray-50/50 focus:bg-white text-gray-900 shadow-sm" placeholder="Nhập số điện thoại liên hệ">
                                @error('phone') <span class="text-red-500 text-xs font-medium">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-8 space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Email (Tuỳ chọn)</label>
                            <input type="email" name="email" value="{{ Auth::user()->email ?? old('email') }}" class="block w-full rounded-2xl border-gray-300 py-3.5 px-4 focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all border bg-gray-50/50 focus:bg-white text-gray-900 shadow-sm" placeholder="Để nhận thông báo về đơn hàng">
                        </div>

                        <div class="mb-8 space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Địa chỉ giao hàng/thi công *</label>
                            <input type="text" name="address" required value="{{ old('address') }}" class="block w-full rounded-2xl border-gray-300 py-3.5 px-4 focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all border bg-gray-50/50 focus:bg-white text-gray-900 shadow-sm" placeholder="Số nhà, tên đường, phường/xã, quận/huyện, tỉnh/thành phố">
                            @error('address') <span class="text-red-500 text-xs font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-10 space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Ghi chú thêm (Tuỳ chọn)</label>
                            <textarea name="note" rows="4" class="block w-full rounded-2xl border-gray-300 py-3.5 px-4 focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all border bg-gray-50/50 focus:bg-white text-gray-900 shadow-sm" placeholder="Nhập bất kỳ yêu cầu đặc biệt nào về giao hàng, thời gian..."></textarea>
                        </div>

                        <button type="submit" class="w-full py-5 px-6 bg-brand-600 text-white rounded-2xl font-black text-xl hover:bg-brand-700 transition-all shadow-xl shadow-brand-500/30 transform hover:-translate-y-1 flex justify-center items-center">
                            <span>Xác Nhận Đặt Hàng Ngay</span>
                            <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-brand-200 p-8 sticky top-28">
                    <div class="flex items-center mb-6 border-b border-gray-100 pb-5">
                        <svg class="w-6 h-6 text-brand-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        <h2 class="text-xl font-bold text-gray-900">Tóm tắt đơn hàng</h2>
                    </div>
                    
                    <div class="space-y-6 mb-6">
                        @foreach($cart as $item)
                        <div class="flex gap-4 group">
                            <div class="w-20 h-20 bg-gray-100 rounded-xl overflow-hidden flex-shrink-0 border border-gray-200">
                                @if($item['image'])
                                    <img src="/storage/{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                                @endif
                            </div>
                            <div class="flex-1 flex flex-col justify-center">
                                <h3 class="font-bold text-gray-900 line-clamp-2 leading-snug">{{ $item['name'] }}</h3>
                                <div class="flex justify-between items-center mt-2">
                                    <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-md">SL: {{ $item['quantity'] }}</span>
                                    <span class="text-brand-600 font-bold text-sm">{{ number_format($item['price']) }} đ</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 space-y-4">
                        <div class="flex justify-between text-gray-600">
                            <span class="font-medium">Tạm tính</span>
                            <span class="font-bold text-gray-900">{{ number_format($total) }} VNĐ</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span class="font-medium">Phí vận chuyển</span>
                            <span class="text-brand-600 font-medium">Thỏa thuận sau</span>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4 mt-2">
                            <div class="flex justify-between items-end">
                                <span class="text-lg font-bold text-gray-900">Tổng cộng</span>
                                <span class="text-3xl font-black text-brand-600">{{ number_format($total) }} đ</span>
                            </div>
                            <p class="text-xs text-gray-500 text-right mt-1">(Chưa bao gồm VAT nếu có)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
