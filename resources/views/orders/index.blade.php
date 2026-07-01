@extends('layouts.main')

@section('title', 'Lịch Sử Mua Hàng')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24 min-h-screen relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-brand-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex items-center mb-10">
            <div class="w-12 h-12 rounded-2xl bg-brand-100 flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Lịch Sử Đặt Hàng Của Bạn</h1>
                <p class="text-gray-500 mt-1 font-medium">Theo dõi và quản lý các giao dịch của bạn</p>
            </div>
        </div>

        @if($orders->count() > 0)
            <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden backdrop-blur-xl">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50/80 backdrop-blur">
                            <tr>
                                <th scope="col" class="px-8 py-5 text-left text-xs font-black text-gray-500 uppercase tracking-wider">Mã Đơn</th>
                                <th scope="col" class="px-8 py-5 text-left text-xs font-black text-gray-500 uppercase tracking-wider">Ngày Đặt</th>
                                <th scope="col" class="px-8 py-5 text-left text-xs font-black text-gray-500 uppercase tracking-wider">Sản Phẩm</th>
                                <th scope="col" class="px-8 py-5 text-left text-xs font-black text-gray-500 uppercase tracking-wider">Tổng Tiền</th>
                                <th scope="col" class="px-8 py-5 text-left text-xs font-black text-gray-500 uppercase tracking-wider">Trạng Thái</th>
                                <th scope="col" class="px-8 py-5 text-right text-xs font-black text-gray-500 uppercase tracking-wider">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-50">
                            @foreach($orders as $order)
                                <tr class="hover:bg-brand-50/30 transition-colors group">
                                    <td class="px-8 py-6 whitespace-nowrap text-sm font-bold text-gray-900">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                                    <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-500 font-medium">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-8 py-6 text-sm text-gray-900 font-medium">
                                        @foreach($order->items as $item)
                                            <div class="truncate max-w-xs">{{ $item->product_name }}</div>
                                        @endforeach
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap text-base font-black text-brand-600">{{ number_format($order->total_amount) }} đ</td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        @if($order->status === 'pending')
                                            <span class="px-4 py-1.5 inline-flex text-xs font-bold rounded-xl bg-yellow-100 text-yellow-800 border border-yellow-200">Chờ xử lý</span>
                                        @elseif($order->status === 'processing')
                                            <span class="px-4 py-1.5 inline-flex text-xs font-bold rounded-xl bg-blue-100 text-blue-800 border border-blue-200">Đang giao dịch</span>
                                        @elseif($order->status === 'completed')
                                            <span class="px-4 py-1.5 inline-flex text-xs font-bold rounded-xl bg-green-100 text-green-800 border border-green-200">Hoàn thành</span>
                                        @else
                                            <span class="px-4 py-1.5 inline-flex text-xs font-bold rounded-xl bg-red-100 text-red-800 border border-red-200">Đã hủy</span>
                                        @endif
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('orders.show', $order->id) }}" class="inline-flex items-center text-brand-600 hover:text-brand-900 bg-brand-50 hover:bg-brand-100 px-4 py-2 rounded-xl transition-colors">
                                            Chi tiết
                                            <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="text-center py-24 bg-white/80 backdrop-blur-xl rounded-3xl border border-gray-100 shadow-xl shadow-gray-200/50 relative overflow-hidden">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-brand-50 rounded-full blur-3xl opacity-50"></div>
                <div class="relative z-10">
                    <div class="mx-auto w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mb-6 border border-gray-100">
                        <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Bạn chưa có đơn hàng nào</h3>
                    <p class="mt-3 text-gray-500 font-medium">Hãy tham khảo các dòng máy công trình chất lượng của chúng tôi.</p>
                    <div class="mt-8">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center px-8 py-4 shadow-lg shadow-brand-500/30 text-base font-bold rounded-2xl text-white bg-brand-600 hover:bg-brand-700 transition-all transform hover:-translate-y-1">
                            Khám Phá Sản Phẩm Ngay
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
