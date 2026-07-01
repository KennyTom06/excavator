@extends('layouts.main')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-white overflow-hidden">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover opacity-10" src="https://images.unsplash.com/photo-1541888081-36b0ce39e144?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Construction background">
            <div class="absolute inset-0 bg-gradient-to-r from-white via-white/90 to-transparent"></div>
        </div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-20 px-4 sm:px-6 lg:px-8">
                <main class="mt-10 mx-auto max-w-7xl sm:mt-12 md:mt-16 lg:mt-20 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <span class="inline-block py-1 px-3 rounded-full bg-brand-100 text-brand-900 text-sm font-semibold tracking-wider mb-4 border border-brand-200">CHẤT LƯỢNG HÀNG ĐẦU</span>
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Giải pháp toàn diện</span>
                            <span class="block text-brand-500">máy móc xây dựng</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-600 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Chúng tôi cung cấp các dòng máy xúc, máy ủi, và thiết bị xây dựng chuyên dụng tốt nhất thị trường. Đảm bảo tiến độ công trình của bạn với chi phí tối ưu và chất lượng vượt trội.
                        </p>
                        <div class="mt-8 flex flex-col sm:flex-row sm:justify-center lg:justify-start gap-4">
                            <div class="rounded-full shadow-lg w-full sm:w-auto">
                                <a href="http://127.0.0.1:8000/san-pham"
   class="w-full flex items-center justify-center px-8 py-3 text-base font-medium rounded-full text-white bg-brand-600 hover:bg-brand-500 transition-colors md:py-4 md:text-lg md:px-10 shadow-brand-500/30 whitespace-nowrap">
    Xem Sản Phẩm
</a>
                            </div>
                            <div class="w-full sm:w-auto">
                                <a href="{{ route('contact') }}" class="w-full flex items-center justify-center px-8 py-3 border border-gray-300 text-base font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50 transition-colors md:py-4 md:text-lg md:px-10">
                                    Liên Hệ Tư Vấn
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full clip-path-polygon" src="/storage/anhtrangchu_1.png" alt="Excavator">
        </div>
    </div>

    <!-- Products Section -->
    <div id="products" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-brand-600 font-semibold tracking-wide uppercase">Danh Mục Thiết Bị</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Sản Phẩm Nổi Bật
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Các dòng máy được tin dùng nhất cho các công trình trọng điểm.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:gap-x-8">
                @forelse($featuredProducts as $product)
                    <div class="group relative bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
                        <div class="w-full min-h-64 bg-gray-200 aspect-w-1 aspect-h-1 overflow-hidden lg:h-64 lg:aspect-none">
                            @if($product->image)
                                <img src="/storage/{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-brand-600 shadow-sm">
                                Model: {{ $product->model ?? 'N/A' }}
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <div class="space-y-2 mb-4">
                                <div class="flex justify-between text-sm text-gray-600 border-b border-gray-50 pb-2">
                                    <span class="font-medium">Trọng lượng:</span>
                                    <span>{{ $product->weight ?? '--' }}</span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-600 border-b border-gray-50 pb-2">
                                    <span class="font-medium">Công suất:</span>
                                    <span>{{ $product->engine_power ?? '--' }}</span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-600">
                                    <span class="font-medium">Dung tích gầu:</span>
                                    <span>{{ $product->bucket_capacity ?? '--' }}</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <p class="text-lg font-bold text-brand-600">{{ $product->price ? number_format($product->price) . ' VNĐ' : 'Liên hệ' }}</p>
                                <button class="w-10 h-10 rounded-full bg-brand-50 text-brand-600 flex items-center justify-center group-hover:bg-brand-600 group-hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center py-20 bg-white rounded-2xl border border-gray-100 shadow-sm">
                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900">Chưa có sản phẩm nào</h3>
                        <p class="mt-1 text-gray-500">Đăng nhập Admin để thêm các dòng máy mới.</p>
                        <div class="mt-6">
                            <a href="/admin" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-brand-600 hover:bg-brand-700">
                                Tới trang Admin
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
            
            @if(count($featuredProducts) > 0)
            <div class="mt-12 text-center">
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-white bg-gray-900 hover:bg-gray-800 transition-colors">
                    Xem tất cả sản phẩm
                </a>
            </div>
            @endif
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-24 bg-white" id="about">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-brand-600 font-semibold tracking-wide uppercase">Tại sao chọn chúng tôi</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Đảm Bảo Tiến Độ & An Toàn
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Chúng tôi cam kết mang lại những giá trị thiết thực nhất cho mọi công trình lớn nhỏ.
                </p>
            </div>

            <div class="mt-16">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                    <div class="relative bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-xl bg-brand-500 text-white shadow-md">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-bold text-gray-900">Máy móc chính hãng</p>
                        </dt>
                        <dd class="mt-4 ml-16 text-base text-gray-500">
                            Nhập khẩu trực tiếp từ các thương hiệu hàng đầu thế giới như Komatsu, Caterpillar, Hitachi.
                        </dd>
                    </div>

                    <div class="relative bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-xl bg-brand-500 text-white shadow-md">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-bold text-gray-900">Hiệu suất vượt trội</p>
                        </dt>
                        <dd class="mt-4 ml-16 text-base text-gray-500">
                            Động cơ mạnh mẽ, tiết kiệm nhiên liệu, hoạt động bền bỉ trong mọi điều kiện khắc nghiệt.
                        </dd>
                    </div>

                    <div class="relative bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-xl bg-brand-500 text-white shadow-md">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-bold text-gray-900">Hỗ trợ kỹ thuật 24/7</p>
                        </dt>
                        <dd class="mt-4 ml-16 text-base text-gray-500">
                            Đội ngũ kỹ sư giàu kinh nghiệm luôn sẵn sàng bảo trì, bảo dưỡng và khắc phục sự cố tận nơi.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection
