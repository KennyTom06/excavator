@extends('layouts.main')

@section('title', $product->name . ' - Thế Giới Máy Xây Dựng')

@section('content')
<div class="bg-gray-50 py-12 sm:py-16 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 bg-white/50 backdrop-blur px-4 py-2 rounded-2xl border border-gray-100 shadow-sm">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="hover:text-brand-600 font-medium transition-colors">Trang chủ</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('products.index') }}" class="hover:text-brand-600 font-medium transition-colors">Sản phẩm</a>
                    </div>
                </li>
                @if($product->category)
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="hover:text-brand-600 font-medium transition-colors">{{ $product->category->name }}</a>
                    </div>
                </li>
                @endif
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="text-brand-600 font-bold line-clamp-1">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-gray-100 overflow-hidden mb-12 relative">
            <div class="absolute top-0 right-0 w-64 h-64 bg-brand-50 rounded-full blur-3xl opacity-50 -mr-20 -mt-20 pointer-events-none"></div>
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-0 relative z-10">
                <!-- Product Image -->
                <div class="aspect-w-4 aspect-h-3 lg:aspect-none lg:h-full bg-gray-50 border-r border-gray-100 p-8 flex items-center justify-center group">
                    @if($product->image)
                        <img src="/storage/{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-contain max-h-[500px] lg:w-full lg:h-full group-hover:scale-105 transition-transform duration-700 ease-in-out drop-shadow-2xl">
                    @else
                        <div class="w-full h-full min-h-[400px] flex items-center justify-center text-gray-300">
                            <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="p-8 lg:p-12 xl:p-16 flex flex-col justify-center bg-white">
                    <span class="inline-block py-1.5 px-4 rounded-full bg-brand-50 text-brand-700 text-xs font-black tracking-widest uppercase mb-6 self-start border border-brand-100 shadow-sm">{{ $product->category->name ?? 'Sản phẩm' }}</span>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 tracking-tight mb-4 leading-tight">{{ $product->name }}</h1>
                    
                    <div class="mt-2 flex items-baseline">
                        <p class="text-4xl sm:text-5xl font-black text-brand-600">{{ $product->price ? number_format($product->price) . ' đ' : 'Liên hệ báo giá' }}</p>
                    </div>

                    <div class="mt-6">
                        @if($product->quantity > 0)
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-green-50 text-green-700 border border-green-200">
                                <span class="w-2.5 h-2.5 rounded-full bg-green-500 mr-2 animate-pulse"></span>
                                Còn hàng ({{ $product->quantity }} chiếc)
                            </span>
                        @else
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-red-50 text-red-700 border border-red-200">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-500 mr-2"></span>
                                Tạm hết hàng
                            </span>
                        @endif
                        @error('product')
                            <p class="text-red-500 text-sm mt-3 font-bold bg-red-50 p-3 rounded-xl">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-10 border-t border-gray-100 pt-10">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Thông số cơ bản
                        </h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-50/80 p-5 rounded-2xl border border-gray-100 hover:border-brand-300 transition-colors">
                                <p class="text-xs font-bold text-gray-500 mb-1 uppercase tracking-wider">Model</p>
                                <p class="font-black text-gray-900 text-lg">{{ $product->model ?? '--' }}</p>
                            </div>
                            <div class="bg-gray-50/80 p-5 rounded-2xl border border-gray-100 hover:border-brand-300 transition-colors">
                                <p class="text-xs font-bold text-gray-500 mb-1 uppercase tracking-wider">Trọng lượng</p>
                                <p class="font-black text-gray-900 text-lg">{{ $product->weight ?? '--' }}</p>
                            </div>
                            <div class="bg-gray-50/80 p-5 rounded-2xl border border-gray-100 hover:border-brand-300 transition-colors">
                                <p class="text-xs font-bold text-gray-500 mb-1 uppercase tracking-wider">Công suất động cơ</p>
                                <p class="font-black text-gray-900 text-lg">{{ $product->engine_power ?? '--' }}</p>
                            </div>
                            <div class="bg-gray-50/80 p-5 rounded-2xl border border-gray-100 hover:border-brand-300 transition-colors">
                                <p class="text-xs font-bold text-gray-500 mb-1 uppercase tracking-wider">Dung tích gầu</p>
                                <p class="font-black text-gray-900 text-lg">{{ $product->bucket_capacity ?? '--' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 flex flex-col sm:flex-row gap-4">
                        @if($product->quantity > 0)
                            <form action="{{ route('cart.add', ['slug' => $product->slug]) }}" method="POST" class="flex-1 flex gap-4">
                                @csrf
                                <div class="w-24 flex-shrink-0 relative">
                                    <label for="quantity" class="sr-only">Số lượng</label>
                                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->quantity }}" class="w-full h-full bg-gray-50 border border-gray-200 text-gray-900 text-lg font-bold rounded-2xl py-4 px-4 text-center focus:ring-2 focus:ring-brand-500 outline-none transition-shadow" required>
                                </div>
                                <button type="submit" class="flex-1 bg-brand-600 border border-transparent rounded-2xl py-4 px-6 flex items-center justify-center text-lg font-bold text-white hover:bg-brand-700 focus:outline-none shadow-xl shadow-brand-500/30 transition-all text-center transform hover:-translate-y-1">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    Thêm vào giỏ
                                </button>
                            </form>
                        @else
                            <button type="button" disabled class="flex-1 bg-gray-200 border border-transparent rounded-2xl py-4 px-8 flex items-center justify-center text-lg font-bold text-gray-500 cursor-not-allowed text-center">
                                Tạm Hết Hàng
                            </button>
                        @endif
                        <a href="{{ route('contact') }}" class="flex-1 bg-gray-900 border border-transparent rounded-2xl py-4 px-8 flex items-center justify-center text-lg font-bold text-white hover:bg-gray-800 focus:outline-none shadow-xl transition-all text-center transform hover:-translate-y-1">
                            Yêu Cầu Báo Giá
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Specifications & Description Tabs -->
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-gray-100 overflow-hidden mb-16 relative">
            <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-brand-50 rounded-full blur-3xl opacity-50 pointer-events-none"></div>
            <div class="border-b border-gray-100 bg-gray-50/50">
                <nav class="flex -mb-px px-8" aria-label="Tabs">
                    <button class="border-brand-500 text-brand-600 whitespace-nowrap py-6 px-4 border-b-2 font-black text-xl tracking-tight">
                        Thông Số Kỹ Thuật Chi Tiết
                    </button>
                </nav>
            </div>
            <div class="p-8 lg:p-12 relative z-10">
                <div class="max-w-5xl">
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-8">
                        <div class="sm:col-span-1 border-b border-gray-100 pb-4">
                            <dt class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-2">Model động cơ</dt>
                            <dd class="text-lg font-bold text-gray-900">{{ $product->engine_model ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-4">
                            <dt class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-2">Tải trọng nâng</dt>
                            <dd class="text-lg font-bold text-gray-900">{{ $product->lifting_capacity ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-4">
                            <dt class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-2">Chiều cao đổ tối đa</dt>
                            <dd class="text-lg font-bold text-gray-900">{{ $product->max_dump_height ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-4">
                            <dt class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-2">Loại hộp số</dt>
                            <dd class="text-lg font-bold text-gray-900">{{ $product->transmission_type ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-4">
                            <dt class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-2">Kích thước lốp</dt>
                            <dd class="text-lg font-bold text-gray-900">{{ $product->tire_size ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-4">
                            <dt class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-2">Kích thước tổng thể</dt>
                            <dd class="text-lg font-bold text-gray-900">{{ $product->overall_dimensions ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-4">
                            <dt class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-2">Chu kỳ làm việc</dt>
                            <dd class="text-lg font-bold text-gray-900">{{ $product->work_cycle ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-4">
                            <dt class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-2">Tốc độ tối đa</dt>
                            <dd class="text-lg font-bold text-gray-900">{{ $product->max_speed ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-4">
                            <dt class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-2">Khả năng leo dốc</dt>
                            <dd class="text-lg font-bold text-gray-900">{{ $product->gradeability ?? 'Đang cập nhật' }}</dd>
                        </div>
                    </dl>

                    @if($product->description)
                    <div class="mt-16 pt-12 border-t border-gray-100">
                        <h3 class="text-2xl font-black text-gray-900 mb-8 tracking-tight">Mô tả sản phẩm</h3>
                        <div class="prose prose-lg prose-brand max-w-none text-gray-600 leading-relaxed">
                            {!! nl2br(e($product->description)) !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div>
            <div class="flex items-center mb-8">
                <h2 class="text-3xl font-black text-gray-900 tracking-tight">Sản Phẩm Cùng Loại</h2>
                <div class="h-1 flex-1 bg-gray-100 ml-6 rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($relatedProducts as $related)
                    <div class="group relative bg-white border border-gray-100 rounded-3xl shadow-lg shadow-gray-200/40 hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2 flex flex-col">
                        <div class="w-full h-56 bg-gray-100 overflow-hidden relative">
                            @if($related->image)
                                <img src="/storage/{{ $related->image }}" alt="{{ $related->name }}" class="w-full h-full object-center object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-300">
                                    <svg class="w-16 h-16 group-hover:scale-110 transition-transform duration-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6 flex-grow flex flex-col">
                            <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-snug group-hover:text-brand-600 transition-colors">
                                <a href="{{ route('products.show', $related->slug) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $related->name }}
                                </a>
                            </h3>
                            <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
                                <p class="text-lg font-black text-brand-600">{{ $related->price ? number_format($related->price) . ' đ' : 'Liên hệ' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
