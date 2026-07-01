@extends('layouts.main')

@section('title', 'Đặt Hàng Thành Công')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24 min-h-[70vh] flex items-center justify-center">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg shadow-green-100">
            <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        </div>
        
        <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Đặt Hàng Thành Công!</h1>
        <p class="text-lg text-gray-500 mb-8">Cảm ơn {{ $order->name }}. Đơn hàng #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }} của bạn đã được ghi nhận.</p>
        
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 text-left mb-8">
            <h2 class="font-bold text-xl mb-4 border-b pb-2">Thông tin đơn hàng</h2>
            <ul class="space-y-3 text-gray-700">
                <li><span class="font-medium">Mã đơn hàng:</span> #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</li>
                <li><span class="font-medium">Số điện thoại:</span> {{ $order->phone }}</li>
                <li><span class="font-medium">Địa chỉ:</span> {{ $order->address }}</li>
                <li><span class="font-medium">Tổng thanh toán:</span> <span class="font-bold text-brand-600">{{ number_format($order->total_amount) }} VNĐ</span></li>
            </ul>
            <p class="mt-6 text-sm text-gray-500 italic">Chuyên viên tư vấn của Tâm Phúc Group sẽ liên hệ với bạn trong vòng 24h để xác nhận và tư vấn thủ tục vận chuyển.</p>
        </div>

        <div class="flex gap-4 justify-center">
            @auth
            <a href="{{ route('orders.index') }}" class="px-6 py-3 bg-brand-50 text-brand-700 font-medium rounded-xl hover:bg-brand-100 transition-colors">Xem lịch sử</a>
            @endauth
            <a href="{{ route('home') }}" class="px-6 py-3 bg-brand-600 text-white font-medium rounded-xl hover:bg-brand-700 shadow-md transition-colors">Về trang chủ</a>
        </div>
    </div>
</div>
@endsection
