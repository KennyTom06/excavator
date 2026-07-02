@extends('layouts.main')

@section('title', $product->name . ' - Thế Giới Máy Xây Dựng')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="hover:text-brand-600">Trang chủ</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('products.index') }}" class="hover:text-brand-600">Sản phẩm</a>
                    </div>
                </li>
                @if($product->category)
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="hover:text-brand-600">{{ $product->category->name }}</a>
                    </div>
                </li>
                @endif
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="text-gray-900 font-medium line-clamp-1">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-12">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8">
                <!-- Product Image -->
                <div class="aspect-w-4 aspect-h-3 lg:aspect-none lg:h-full bg-gray-100">
                    @if($product->image)
                        <img src="/storage/{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    @else
                        <div class="w-full h-full min-h-[400px] flex items-center justify-center text-gray-400">
                            <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    <span class="inline-block py-1 px-3 rounded-full bg-brand-100 text-brand-900 text-xs font-bold tracking-wider uppercase mb-4 self-start">{{ $product->category->name ?? 'Sản phẩm' }}</span>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-2">{{ $product->name }}</h1>
                    
                    <div class="mt-4 flex items-baseline">
                        <p class="text-3xl font-bold text-brand-600">{{ $product->price ? number_format($product->price) . ' VNĐ' : 'Liên hệ để nhận báo giá' }}</p>
                    </div>

                    <div class="mt-4">
                        @if($product->quantity > 0)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <svg class="mr-1.5 h-4 w-4 text-green-600" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" /></svg>
                                Còn hàng ({{ $product->quantity }} chiếc)
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                <svg class="mr-1.5 h-4 w-4 text-red-600" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" /></svg>
                                Tạm hết hàng
                            </span>
                        @endif
                        @error('product')
                            <p class="text-red-500 text-sm mt-2 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-8 border-t border-gray-100 pt-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Thông số cơ bản</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                <p class="text-sm text-gray-500 mb-1">Model</p>
                                <p class="font-bold text-gray-900">{{ $product->model ?? '--' }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                <p class="text-sm text-gray-500 mb-1">Trọng lượng</p>
                                <p class="font-bold text-gray-900">{{ $product->weight ?? '--' }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                <p class="text-sm text-gray-500 mb-1">Công suất động cơ</p>
                                <p class="font-bold text-gray-900">{{ $product->engine_power ?? '--' }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                <p class="text-sm text-gray-500 mb-1">Dung tích gầu</p>
                                <p class="font-bold text-gray-900">{{ $product->bucket_capacity ?? '--' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 flex flex-col xl:flex-row gap-4">
                        @if($product->quantity > 0)
                            <form action="{{ route('cart.add', ['slug' => $product->slug]) }}" method="POST" class="flex-1 flex items-center gap-3">
                                @csrf
                                <div class="w-24 shrink-0 relative">
                                    <input type="number" name="quantity" value="1" min="1" class="w-full border-gray-300 rounded-full shadow-sm focus:border-primary focus:ring-primary sm:text-base text-center py-4 font-bold text-gray-900">
                                </div>
                                <button type="submit" class="flex-1 bg-primary border border-transparent rounded-full py-4 px-6 flex items-center justify-center text-base font-bold text-white hover:bg-primary-container focus:outline-none shadow-lg shadow-primary/30 transition-all text-center whitespace-nowrap">
                                    Thêm vào giỏ
                                </button>
                            </form>
                        @else
                            <button type="button" disabled class="flex-1 bg-gray-300 border border-transparent rounded-full py-4 px-8 flex items-center justify-center text-base font-bold text-gray-500 cursor-not-allowed text-center whitespace-nowrap">
                                Hết Hàng
                            </button>
                        @endif
                        <a href="{{ route('contact') }}" class="flex-1 bg-gray-900 border border-transparent rounded-full py-4 px-6 flex items-center justify-center text-base font-bold text-white hover:bg-gray-800 focus:outline-none shadow-lg transition-all text-center whitespace-nowrap">
                            Yêu Cầu Báo Giá
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Specifications & Description Tabs -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-16">
            <div class="border-b border-gray-200">
                <nav class="flex -mb-px px-8" aria-label="Tabs">
                    <button class="border-brand-500 text-brand-600 whitespace-nowrap py-6 px-4 border-b-2 font-bold text-lg">
                        Thông Số Kỹ Thuật Chi Tiết
                    </button>
                </nav>
            </div>
            <div class="p-8">
                <div class="max-w-4xl">
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-6">
                        <div class="sm:col-span-1 border-b border-gray-100 pb-3">
                            <dt class="text-sm font-medium text-gray-500">Model động cơ</dt>
                            <dd class="mt-1 text-base font-semibold text-gray-900">{{ $product->engine_model ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-3">
                            <dt class="text-sm font-medium text-gray-500">Tải trọng nâng</dt>
                            <dd class="mt-1 text-base font-semibold text-gray-900">{{ $product->lifting_capacity ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-3">
                            <dt class="text-sm font-medium text-gray-500">Chiều cao đổ tối đa</dt>
                            <dd class="mt-1 text-base font-semibold text-gray-900">{{ $product->max_dump_height ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-3">
                            <dt class="text-sm font-medium text-gray-500">Loại hộp số</dt>
                            <dd class="mt-1 text-base font-semibold text-gray-900">{{ $product->transmission_type ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-3">
                            <dt class="text-sm font-medium text-gray-500">Kích thước lốp</dt>
                            <dd class="mt-1 text-base font-semibold text-gray-900">{{ $product->tire_size ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-3">
                            <dt class="text-sm font-medium text-gray-500">Kích thước tổng thể</dt>
                            <dd class="mt-1 text-base font-semibold text-gray-900">{{ $product->overall_dimensions ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-3">
                            <dt class="text-sm font-medium text-gray-500">Chu kỳ làm việc</dt>
                            <dd class="mt-1 text-base font-semibold text-gray-900">{{ $product->work_cycle ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-3">
                            <dt class="text-sm font-medium text-gray-500">Tốc độ tối đa</dt>
                            <dd class="mt-1 text-base font-semibold text-gray-900">{{ $product->max_speed ?? 'Đang cập nhật' }}</dd>
                        </div>
                        <div class="sm:col-span-1 border-b border-gray-100 pb-3">
                            <dt class="text-sm font-medium text-gray-500">Khả năng leo dốc</dt>
                            <dd class="mt-1 text-base font-semibold text-gray-900">{{ $product->gradeability ?? 'Đang cập nhật' }}</dd>
                        </div>
                    </dl>

                    @if($product->description)
                    <div class="mt-12 pt-8 border-t border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Mô tả sản phẩm</h3>
                        <div class="prose prose-brand max-w-none text-gray-600">
                            {{ $product->description }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div>
            <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight mb-8">Sản Phẩm Cùng Loại</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                    <div class="group relative bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
                        <div class="w-full h-48 bg-gray-200 overflow-hidden relative">
                            @if($related->image)
                                <img src="/storage/{{ $related->image }}" alt="{{ $related->name }}" class="w-full h-full object-center object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1 line-clamp-2">
                                <a href="{{ route('products.show', $related->slug) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $related->name }}
                                </a>
                            </h3>
                            <p class="text-sm font-bold text-brand-600 mt-2">{{ $related->price ? number_format($related->price) . ' VNĐ' : 'Liên hệ' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
