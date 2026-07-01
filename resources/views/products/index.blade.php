@extends('layouts.main')

@section('title', 'Sản Phẩm - Thế Giới Máy Xây Dựng')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Danh Sách Sản Phẩm</h1>
                <p class="mt-2 text-sm text-gray-500">Khám phá các dòng máy xúc, máy ủi, thiết bị thi công chất lượng cao.</p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar / Categories -->
            <div class="w-full lg:w-1/4">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-28">
                    <h3 class="font-bold text-gray-900 mb-4 uppercase text-sm tracking-wider">Danh mục sản phẩm</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('products.index') }}" class="flex items-center text-gray-600 hover:text-brand-600 transition-colors {{ !request()->has('category') ? 'font-bold text-brand-600' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ !request()->has('category') ? 'bg-brand-500' : 'bg-gray-300' }} mr-3"></span>
                                Tất cả sản phẩm
                            </a>
                        </li>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="flex items-center text-gray-600 hover:text-brand-600 transition-colors {{ request()->get('category') == $category->slug ? 'font-bold text-brand-600' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ request()->get('category') == $category->slug ? 'bg-brand-500' : 'bg-gray-300' }} mr-3"></span>
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="w-full lg:w-3/4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($products as $product)
                        <div class="group relative bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
                            <div class="w-full h-56 bg-gray-200 overflow-hidden relative">
                                @if($product->image)
                                    <img src="/storage/{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-brand-600 shadow-sm">
                                    {{ $product->model ?? 'N/A' }}
                                </div>
                            </div>
                            <div class="p-5">
                                <p class="text-xs text-gray-500 mb-1">{{ $product->category->name ?? 'Khác' }}</p>
                                <h3 class="text-lg font-bold text-gray-900 mb-3 line-clamp-1">
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <div class="space-y-1.5 mb-4">
                                    <div class="flex justify-between text-xs text-gray-600">
                                        <span class="font-medium text-gray-500">Trọng lượng:</span>
                                        <span class="text-gray-900 font-medium">{{ $product->weight ?? '--' }}</span>
                                    </div>
                                    <div class="flex justify-between text-xs text-gray-600">
                                        <span class="font-medium text-gray-500">Công suất:</span>
                                        <span class="text-gray-900 font-medium">{{ $product->engine_power ?? '--' }}</span>
                                    </div>
                                    <div class="flex justify-between text-xs text-gray-600">
                                        <span class="font-medium text-gray-500">Dung tích gầu:</span>
                                        <span class="text-gray-900 font-medium">{{ $product->bucket_capacity ?? '--' }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                    <p class="text-base font-bold text-brand-600">{{ $product->price ? number_format($product->price) . ' VNĐ' : 'Liên hệ' }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20 bg-white rounded-2xl border border-gray-100 shadow-sm">
                            <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900">Không tìm thấy sản phẩm nào</h3>
                            <p class="mt-1 text-gray-500">Vui lòng thử chọn danh mục khác.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
