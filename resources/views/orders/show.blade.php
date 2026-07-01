@extends('layouts.main')

@section('title', 'Chi Tiết Đơn Hàng #' . str_pad($order->id, 5, '0', STR_PAD_LEFT))

@section('content')
<div class="bg-gray-50 py-16 sm:py-24 min-h-screen relative overflow-hidden">
    <!-- Background elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-brand-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-brand-600 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000 pointer-events-none"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="mb-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <a href="{{ route('orders.index') }}" class="inline-flex items-center text-gray-500 hover:text-brand-600 bg-white/80 backdrop-blur px-4 py-2 rounded-2xl border border-gray-100 shadow-sm font-bold transition-all hover:shadow-md transform hover:-translate-x-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Quay lại danh sách
            </a>
            <div class="text-sm font-medium text-gray-500 bg-white/80 backdrop-blur px-4 py-2 rounded-2xl border border-gray-100 shadow-sm">
                Ngày đặt: <span class="text-gray-900 font-bold ml-1">{{ $order->created_at->format('d/m/Y H:i') }}</span>
            </div>
        </div>

        <div class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8 sm:p-12 mb-8 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-brand-50 rounded-full blur-3xl opacity-50 -mr-20 -mt-20 pointer-events-none"></div>
            
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-gray-100 pb-8 mb-8 relative z-10">
                <div class="flex items-center">
                    <div class="w-14 h-14 rounded-2xl bg-brand-50 flex items-center justify-center mr-5 border border-brand-100">
                        <svg class="w-7 h-7 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-black text-gray-900 tracking-tight">Chi Tiết Đơn Hàng</h1>
                        <p class="text-brand-600 font-bold text-lg mt-1">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>
                <div class="mt-6 sm:mt-0">
                    @if($order->status === 'pending')
                        <span class="px-5 py-2.5 inline-flex text-sm font-bold rounded-2xl bg-yellow-100 text-yellow-800 border border-yellow-200 shadow-sm">
                            <span class="w-2 h-2 rounded-full bg-yellow-500 mr-2 mt-1.5 animate-pulse"></span>
                            Chờ xử lý
                        </span>
                    @elseif($order->status === 'processing')
                        <span class="px-5 py-2.5 inline-flex text-sm font-bold rounded-2xl bg-blue-100 text-blue-800 border border-blue-200 shadow-sm">
                            <span class="w-2 h-2 rounded-full bg-blue-500 mr-2 mt-1.5 animate-pulse"></span>
                            Đang giao dịch
                        </span>
                    @elseif($order->status === 'completed')
                        <span class="px-5 py-2.5 inline-flex text-sm font-bold rounded-2xl bg-green-100 text-green-800 border border-green-200 shadow-sm">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Hoàn thành
                        </span>
                    @else
                        <span class="px-5 py-2.5 inline-flex text-sm font-bold rounded-2xl bg-red-100 text-red-800 border border-red-200 shadow-sm">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            Đã hủy
                        </span>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10 relative z-10">
                <div class="bg-gray-50/80 p-6 rounded-2xl border border-gray-100">
                    <h3 class="text-xs font-black text-gray-500 uppercase tracking-widest mb-5 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Thông tin khách hàng
                    </h3>
                    <ul class="space-y-4 text-gray-800">
                        <li class="flex items-start"><span class="font-bold text-gray-400 w-24 flex-shrink-0">Họ tên:</span> <span class="font-bold text-gray-900">{{ $order->name }}</span></li>
                        <li class="flex items-start"><span class="font-bold text-gray-400 w-24 flex-shrink-0">Điện thoại:</span> <span class="font-bold text-gray-900">{{ $order->phone }}</span></li>
                        <li class="flex items-start"><span class="font-bold text-gray-400 w-24 flex-shrink-0">Email:</span> <span class="font-bold text-gray-900">{{ $order->email ?? 'Không có' }}</span></li>
                    </ul>
                </div>
                <div class="bg-gray-50/80 p-6 rounded-2xl border border-gray-100">
                    <h3 class="text-xs font-black text-gray-500 uppercase tracking-widest mb-5 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Giao hàng / Thi công
                    </h3>
                    <ul class="space-y-4 text-gray-800">
                        <li class="flex items-start"><span class="font-bold text-gray-400 w-24 flex-shrink-0">Địa chỉ:</span> <span class="font-bold text-gray-900">{{ $order->address }}</span></li>
                        <li class="flex items-start"><span class="font-bold text-gray-400 w-24 flex-shrink-0">Ghi chú:</span> <span class="font-medium text-gray-900 italic">{{ $order->note ?? 'Không có ghi chú' }}</span></li>
                    </ul>
                </div>
            </div>

            <div class="relative z-10">
                <h3 class="text-sm font-black text-gray-900 uppercase tracking-wider mb-6 border-b border-gray-100 pb-4">Danh sách sản phẩm</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50/50 rounded-xl">
                            <tr>
                                <th class="text-left py-4 px-4 font-bold text-gray-500 rounded-l-xl text-xs uppercase tracking-wider">Tên sản phẩm</th>
                                <th class="text-center py-4 px-4 font-bold text-gray-500 text-xs uppercase tracking-wider">Số lượng</th>
                                <th class="text-right py-4 px-4 font-bold text-gray-500 text-xs uppercase tracking-wider">Đơn giá</th>
                                <th class="text-right py-4 px-4 font-bold text-gray-500 rounded-r-xl text-xs uppercase tracking-wider">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($order->items as $item)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="py-5 px-4">
                                        @if($item->product && $item->product->slug)
                                            <a href="{{ route('products.show', $item->product->slug) }}" class="font-bold text-gray-900 hover:text-brand-600 transition-colors">{{ $item->product_name }}</a>
                                        @else
                                            <span class="font-bold text-gray-900">{{ $item->product_name }}</span>
                                        @endif
                                    </td>
                                    <td class="py-5 px-4 text-center font-bold text-gray-600 bg-gray-50/30">{{ $item->quantity }}</td>
                                    <td class="py-5 px-4 text-right font-medium text-gray-500">{{ number_format($item->price) }} đ</td>
                                    <td class="py-5 px-4 text-right font-black text-brand-600 text-lg">{{ number_format($item->total) }} đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="border-t border-gray-200">
                                <td colspan="3" class="py-6 px-4 text-right font-bold text-gray-600 text-lg uppercase tracking-wider">Tổng Thanh Toán:</td>
                                <td class="py-6 px-4 text-right font-black text-brand-600 text-3xl">{{ number_format($order->total_amount) }} đ</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
