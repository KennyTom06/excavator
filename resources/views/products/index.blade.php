@extends('layouts.main')

@section('title', 'Sản Phẩm - Thế Giới Máy Xây Dựng')

@section('content')
<div class="bg-gray-50 py-12 sm:py-20 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="relative bg-brand-900 rounded-3xl overflow-hidden mb-12 shadow-2xl">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1541888087401-d5bbc2c140c8?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Máy xây dựng" class="w-full h-full object-cover opacity-20">
                <div class="absolute inset-0 bg-gradient-to-r from-brand-900 to-transparent"></div>
            </div>
            <div class="relative px-8 py-16 sm:px-16 sm:py-24 max-w-2xl">
                <h1 class="text-4xl sm:text-5xl font-black text-white tracking-tight mb-4">Danh Mục Sản Phẩm</h1>
                <p class="text-lg text-gray-200">Khám phá các dòng máy xúc, máy ủi, và thiết bị thi công cơ giới chất lượng hàng đầu cho công trình của bạn.</p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar / Categories -->
            <div class="w-full lg:w-1/4">
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8 sticky top-28">
                    <div class="flex items-center mb-6 border-b border-gray-100 pb-4">
                        <svg class="w-5 h-5 text-brand-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                        <h3 class="font-bold text-gray-900 text-lg uppercase tracking-wider">Danh Mục</h3>
                    </div>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('products.index') }}" class="flex items-center text-base hover:text-brand-600 transition-all group {{ !request()->has('category') ? 'font-bold text-brand-600' : 'text-gray-600' }}">
                                <span class="w-2 h-2 rounded-full mr-3 transition-colors {{ !request()->has('category') ? 'bg-brand-500 shadow-sm shadow-brand-500/50' : 'bg-gray-300 group-hover:bg-brand-400' }}"></span>
                                Tất cả sản phẩm
                            </a>
                        </li>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="flex items-center text-base hover:text-brand-600 transition-all group {{ request()->get('category') == $category->slug ? 'font-bold text-brand-600' : 'text-gray-600' }}">
                                <span class="w-2 h-2 rounded-full mr-3 transition-colors {{ request()->get('category') == $category->slug ? 'bg-brand-500 shadow-sm shadow-brand-500/50' : 'bg-gray-300 group-hover:bg-brand-400' }}"></span>
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="w-full lg:w-3/4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($products as $product)
                        <div class="group relative bg-white border border-gray-100 rounded-3xl shadow-lg shadow-gray-200/40 hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2 flex flex-col">
                            <div class="w-full h-64 bg-gray-100 overflow-hidden relative">
                                @if($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-300 group-hover:scale-110 transition-transform duration-700">
                                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-4 py-1.5 rounded-full text-xs font-black text-brand-600 shadow-md">
                                    {{ $product->model ?? 'N/A' }}
                                </div>
                            </div>
                            <div class="p-6 flex-grow flex flex-col">
                                <p class="text-xs font-bold uppercase tracking-wider text-brand-500 mb-2">{{ $product->category->name ?? 'Khác' }}</p>
                                <h3 class="text-xl font-bold text-gray-900 mb-4 line-clamp-2 leading-snug group-hover:text-brand-600 transition-colors">
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <div class="space-y-2.5 mb-6">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                                        <span class="font-medium mr-1">Trọng lượng:</span> {{ $product->weight ?? '--' }}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                        <span class="font-medium mr-1">Công suất:</span> {{ $product->engine_power ?? '--' }}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                        <span class="font-medium mr-1">Dung tích:</span> {{ $product->bucket_capacity ?? '--' }}
                                    </div>
                                </div>
                                <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                                    <p class="text-lg font-black text-brand-600">{{ $product->price ? number_format($product->price) . ' đ' : 'Liên hệ' }}</p>
                                    <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center group-hover:bg-brand-600 transition-colors duration-300">
                                        <svg class="w-5 h-5 text-brand-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center py-24 bg-white rounded-3xl border border-gray-100 shadow-xl shadow-gray-200/50">
                            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Không tìm thấy sản phẩm nào</h3>
                            <p class="mt-2 text-gray-500 font-medium">Vui lòng thử chọn danh mục khác.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
