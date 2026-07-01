@extends('layouts.main')

@section('title', 'Chi Tiết Đơn Hàng #' . str_pad($order->id, 5, '0', STR_PAD_LEFT))

@section('content')
<div class="bg-gray-50 py-12 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('orders.index') }}" class="text-gray-500 hover:text-brand-600 flex items-center gap-1 font-medium transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Quay lại
            </a>
            <div class="text-sm text-gray-500">Ngày đặt: {{ $order->created_at->format('d/m/Y H:i') }}</div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 mb-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-gray-100 pb-6 mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Chi Tiết Đơn Hàng #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h1>
                </div>
                <div class="mt-4 sm:mt-0">
                    @if($order->status === 'pending')
                        <span class="px-4 py-2 inline-flex text-sm font-bold rounded-full bg-yellow-100 text-yellow-800">Chờ xử lý</span>
                    @elseif($order->status === 'processing')
                        <span class="px-4 py-2 inline-flex text-sm font-bold rounded-full bg-blue-100 text-blue-800">Đang giao dịch</span>
                    @elseif($order->status === 'completed')
                        <span class="px-4 py-2 inline-flex text-sm font-bold rounded-full bg-green-100 text-green-800">Hoàn thành</span>
                    @else
                        <span class="px-4 py-2 inline-flex text-sm font-bold rounded-full bg-red-100 text-red-800">Đã hủy</span>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">Thông tin khách hàng</h3>
                    <ul class="space-y-3 text-gray-800">
                        <li><span class="font-medium text-gray-500 mr-2">Họ tên:</span> {{ $order->name }}</li>
                        <li><span class="font-medium text-gray-500 mr-2">Điện thoại:</span> {{ $order->phone }}</li>
                        <li><span class="font-medium text-gray-500 mr-2">Email:</span> {{ $order->email ?? 'Không có' }}</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">Giao hàng / Thi công</h3>
                    <ul class="space-y-3 text-gray-800">
                        <li><span class="font-medium text-gray-500 mr-2">Địa chỉ:</span> {{ $order->address }}</li>
                        <li><span class="font-medium text-gray-500 mr-2">Ghi chú:</span> {{ $order->note ?? 'Không có' }}</li>
                    </ul>
                </div>
            </div>

            <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4 border-t border-gray-100 pt-8">Sản phẩm đã đặt</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 font-semibold text-gray-700">Tên sản phẩm</th>
                            <th class="text-center py-3 font-semibold text-gray-700">Số lượng</th>
                            <th class="text-right py-3 font-semibold text-gray-700">Đơn giá</th>
                            <th class="text-right py-3 font-semibold text-gray-700">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($order->items as $item)
                            <tr>
                                <td class="py-4 font-medium text-gray-900">
                                    @if($item->product && $item->product->slug)
                                        <a href="{{ route('products.show', $item->product->slug) }}" class="hover:text-brand-600 transition-colors">{{ $item->product_name }}</a>
                                    @else
                                        {{ $item->product_name }}
                                    @endif
                                </td>
                                <td class="py-4 text-center text-gray-600">{{ $item->quantity }}</td>
                                <td class="py-4 text-right text-gray-600">{{ number_format($item->price) }} đ</td>
                                <td class="py-4 text-right font-bold text-gray-900">{{ number_format($item->total) }} đ</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="border-t-2 border-gray-200">
                            <td colspan="3" class="py-4 text-right font-bold text-gray-700 text-lg">Tổng cộng:</td>
                            <td class="py-4 text-right font-bold text-brand-600 text-xl">{{ number_format($order->total_amount) }} đ</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
