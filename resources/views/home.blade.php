@extends('layouts.main')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-black overflow-hidden min-h-[90vh] flex items-center">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover opacity-40 scale-105 transform origin-center transition-transform duration-[20s] hover:scale-110" src="https://images.unsplash.com/photo-1541888081-36b0ce39e144?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Construction background">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/70 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50 to-transparent"></div>
        </div>
        
        <div class="max-w-7xl mx-auto relative z-10 w-full px-4 sm:px-6 lg:px-8">
            <div class="lg:w-2/3 animate-fade-in-up">
                <span class="inline-block py-1.5 px-4 rounded-full bg-brand-500/20 text-white text-sm font-bold tracking-widest uppercase mb-6 border border-brand-500/30 backdrop-blur-sm shadow-[0_0_15px_rgba(245,158,11,0.3)]">
                    CHẤT LƯỢNG HÀNG ĐẦU
                </span>
                <h1 class="text-5xl tracking-tight font-extrabold text-white sm:text-6xl md:text-7xl leading-tight">
                    <span class="block">Giải pháp toàn diện</span>
                    <span class="block text-brand-500 font-black drop-shadow-[0_0_20px_rgba(245,158,11,0.5)]">
                        máy móc xây dựng
                    </span>
                </h1>
                <p class="mt-6 text-lg text-gray-200 sm:text-xl max-w-2xl leading-relaxed drop-shadow-md">
                    Chúng tôi cung cấp các dòng máy xúc, máy ủi, và thiết bị xây dựng chuyên dụng tốt nhất thị trường. Đảm bảo tiến độ công trình của bạn với chi phí tối ưu và chất lượng vượt trội.
                </p>
                <div class="mt-10 flex flex-col sm:flex-row gap-5">
                    <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold rounded-2xl text-white bg-brand-600 hover:bg-brand-500 transition-all shadow-[0_0_20px_rgba(245,158,11,0.4)] hover:shadow-[0_0_30px_rgba(245,158,11,0.6)] transform hover:-translate-y-1">
                        Khám Phá Ngay
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold rounded-2xl text-white border-2 border-white/20 hover:bg-white/10 backdrop-blur-sm transition-all transform hover:-translate-y-1 hover:border-white/40 shadow-lg">
                        Nhận Báo Giá
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div id="products" class="py-24 bg-gray-50 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-brand-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none -mt-32 -mr-32"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block py-1.5 px-4 rounded-full bg-brand-50 text-brand-700 text-xs font-black tracking-widest uppercase mb-4 border border-brand-100 shadow-sm">Danh Mục Thiết Bị</span>
                <h2 class="text-4xl leading-tight font-black tracking-tight text-gray-900 sm:text-5xl mb-4">
                    Sản Phẩm Nổi Bật
                </h2>
                <p class="text-xl text-gray-500 mx-auto">
                    Các dòng máy được tin dùng nhất cho các công trình trọng điểm.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-8 lg:grid-cols-3">
                @forelse($featuredProducts as $product)
                    <div class="group relative bg-white border border-gray-100 rounded-3xl shadow-lg shadow-gray-200/40 hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2 flex flex-col">
                        <div class="w-full h-64 bg-gray-100 overflow-hidden relative">
                            @if($product->image)
                                <img src="/storage/{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-300 group-hover:scale-110 transition-transform duration-700">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-4 py-1.5 rounded-full text-xs font-black text-brand-600 shadow-md border border-white/50">
                                Model: {{ $product->model ?? 'N/A' }}
                            </div>
                        </div>
                        <div class="p-6 flex-grow flex flex-col">
                            <h3 class="text-xl font-bold text-gray-900 mb-4 line-clamp-2 leading-snug group-hover:text-brand-600 transition-colors">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <div class="space-y-2.5 mb-6">
                                <div class="flex items-center text-sm text-gray-600 bg-gray-50/80 p-2 rounded-lg">
                                    <svg class="w-4 h-4 mr-2 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                                    <span class="font-medium mr-1 text-gray-500 w-24">Trọng lượng:</span> <span class="font-bold text-gray-900">{{ $product->weight ?? '--' }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600 bg-gray-50/80 p-2 rounded-lg">
                                    <svg class="w-4 h-4 mr-2 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    <span class="font-medium mr-1 text-gray-500 w-24">Công suất:</span> <span class="font-bold text-gray-900">{{ $product->engine_power ?? '--' }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600 bg-gray-50/80 p-2 rounded-lg">
                                    <svg class="w-4 h-4 mr-2 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                    <span class="font-medium mr-1 text-gray-500 w-24">Dung tích gầu:</span> <span class="font-bold text-gray-900">{{ $product->bucket_capacity ?? '--' }}</span>
                                </div>
                            </div>
                            <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                                <p class="text-xl font-black text-brand-600">{{ $product->price ? number_format($product->price) . ' đ' : 'Liên hệ' }}</p>
                                <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center group-hover:bg-brand-600 transition-colors duration-300">
                                    <svg class="w-5 h-5 text-brand-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center py-24 bg-white/80 backdrop-blur rounded-3xl border border-gray-100 shadow-xl shadow-gray-200/50">
                        <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Chưa có sản phẩm nào</h3>
                        <p class="mt-2 text-gray-500 font-medium mb-8">Đăng nhập Admin để thêm các dòng máy mới.</p>
                        <a href="/admin" class="inline-flex items-center px-8 py-4 border border-transparent shadow-lg text-base font-bold rounded-2xl text-white bg-gray-900 hover:bg-gray-800 transition-all transform hover:-translate-y-1">
                            Tới trang Admin
                        </a>
                    </div>
                @endforelse
            </div>
            
            @if(count($featuredProducts) > 0)
            <div class="mt-16 text-center">
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center px-10 py-4 border border-gray-200 text-lg font-bold rounded-2xl text-gray-900 bg-white hover:bg-gray-50 hover:border-gray-300 shadow-sm hover:shadow-md transition-all transform hover:-translate-y-1">
                    Xem tất cả sản phẩm
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
            @endif
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-24 bg-white relative overflow-hidden" id="about">
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-brand-50 rounded-full mix-blend-multiply filter blur-3xl opacity-50 pointer-events-none -mb-32 -ml-32"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <span class="inline-block py-1.5 px-4 rounded-full bg-brand-50 text-brand-700 text-xs font-black tracking-widest uppercase mb-4 border border-brand-100 shadow-sm">Tại sao chọn chúng tôi</span>
                <h2 class="text-4xl leading-tight font-black tracking-tight text-gray-900 sm:text-5xl mb-4">
                    Đảm Bảo Tiến Độ & An Toàn
                </h2>
                <p class="text-xl text-gray-500 mx-auto leading-relaxed">
                    Chúng tôi cam kết mang lại những giá trị thiết thực nhất cho mọi công trình lớn nhỏ.
                </p>
            </div>

            <div class="mt-16">
                <dl class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="relative bg-white p-8 rounded-3xl border border-gray-100 shadow-xl shadow-gray-200/30 hover:shadow-2xl hover:border-brand-200 transition-all duration-300 transform hover:-translate-y-2 group">
                        <dt>
                            <div class="absolute -top-8 left-8 flex items-center justify-center h-16 w-16 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-600 text-white shadow-lg shadow-brand-500/40 group-hover:scale-110 transition-transform">
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <p class="mt-6 text-xl leading-6 font-black text-gray-900">Máy móc chính hãng</p>
                        </dt>
                        <dd class="mt-4 text-base text-gray-600 leading-relaxed">
                            Nhập khẩu trực tiếp từ các thương hiệu hàng đầu thế giới như Komatsu, Caterpillar, Hitachi.
                        </dd>
                    </div>

                    <div class="relative bg-white p-8 rounded-3xl border border-gray-100 shadow-xl shadow-gray-200/30 hover:shadow-2xl hover:border-brand-200 transition-all duration-300 transform hover:-translate-y-2 group mt-12 sm:mt-0 lg:mt-12">
                        <dt>
                            <div class="absolute -top-8 left-8 flex items-center justify-center h-16 w-16 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-600 text-white shadow-lg shadow-brand-500/40 group-hover:scale-110 transition-transform">
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <p class="mt-6 text-xl leading-6 font-black text-gray-900">Hiệu suất vượt trội</p>
                        </dt>
                        <dd class="mt-4 text-base text-gray-600 leading-relaxed">
                            Động cơ mạnh mẽ, tiết kiệm nhiên liệu, hoạt động bền bỉ trong mọi điều kiện khắc nghiệt.
                        </dd>
                    </div>

                    <div class="relative bg-white p-8 rounded-3xl border border-gray-100 shadow-xl shadow-gray-200/30 hover:shadow-2xl hover:border-brand-200 transition-all duration-300 transform hover:-translate-y-2 group mt-12 sm:mt-12 lg:mt-0">
                        <dt>
                            <div class="absolute -top-8 left-8 flex items-center justify-center h-16 w-16 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-600 text-white shadow-lg shadow-brand-500/40 group-hover:scale-110 transition-transform">
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <p class="mt-6 text-xl leading-6 font-black text-gray-900">Hỗ trợ kỹ thuật 24/7</p>
                        </dt>
                        <dd class="mt-4 text-base text-gray-600 leading-relaxed">
                            Đội ngũ kỹ sư giàu kinh nghiệm luôn sẵn sàng bảo trì, bảo dưỡng và khắc phục sự cố tận nơi.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection
