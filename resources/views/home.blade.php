@extends('layouts.main')

@section('content')
@php
    $company = config('company');
    $companySlogan = $company['tagline'] ?? 'Đối Tác Tin Cậy Mọi Công Trình';
    $companyDescription = $company['description'] ?? 'Cung cấp giải pháp thiết bị công nghiệp nặng bền bỉ với dịch vụ hậu mãi chuyên nghiệp hàng đầu tại Việt Nam.';
    $heroImage = asset('images/khonggianxanh_1.jpg');
@endphp

    <!-- Hero Section -->
    <section class="relative h-[80vh] min-h-[600px] w-full flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img alt="{{ config('company.name') }}" class="w-full h-full object-cover" src="{{ $heroImage }}"/>
            <div class="absolute inset-0 bg-hero-overlay"></div>
        </div>

        <div class="relative z-10 w-full px-gutter md:px-section-gap max-w-container-max mx-auto text-white">
            <div class="max-w-2xl">
             <h1 class="font-headline-xl text-headline-xl-mobile md:text-headline-xl mb-stack-md text-white drop-shadow-[0_4px_16px_rgba(0,0,0,0.7)]">
    {{ $companySlogan }}
</h1>
<<p class="inline-block font-body-lg text-body-lg text-white bg-black/45 px-4 py-2 rounded-lg mb-stack-lg">
    {{ $companyDescription }}
</p>
                <div class="flex flex-wrap gap-stack-md">
    <a href="{{ route('products.index') }}"
       class="bg-yellow-400 text-gray-900 py-4 px-8 rounded-lg font-headline-md flex items-center gap-2 hover:scale-105 transition-transform">
        Khám phá sản phẩm
        <span class="material-symbols-outlined text-xl">arrow_outward</span>
    </a>
</div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="bg-on-background py-stack-lg text-white">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-gutter w-full px-gutter md:px-section-gap max-w-container-max mx-auto text-center">
            <div>
                <p class="text-headline-lg font-headline-lg text-primary-container">{{ $company['experience_years'] ?? '15+' }}</p>
                <p class="text-label-bold uppercase opacity-70">Năm Kinh Nghiệm</p>
            </div>
            <div>
                <p class="text-headline-lg font-headline-lg text-primary-container">{{ $company['machines_delivered'] ?? '500+' }}</p>
                <p class="text-label-bold uppercase opacity-70">Thiết Bị Đã Bàn Giao</p>
            </div>
            <div>
                <p class="text-headline-lg font-headline-lg text-primary-container">{{ $company['support_provinces'] ?? '63' }}</p>
                <p class="text-label-bold uppercase opacity-70">Tỉnh Thành Hỗ Trợ</p>
            </div>
            <div>
                <p class="text-headline-lg font-headline-lg text-primary-container">{{ $company['support_time'] ?? '24/7' }}</p>
                <p class="text-label-bold uppercase opacity-70">Hỗ Trợ Kỹ Thuật</p>
            </div>
        </div>
    </section>

    <!-- Category & Filters -->
    <section class="py-section-gap">
        <div class="w-full px-gutter md:px-section-gap max-w-container-max mx-auto">
            <div class="text-center mb-section-gap">
                <h2 class="text-headline-lg font-headline-lg mb-stack-sm">Máy Móc Và Dịch Vụ Của Chúng Tôi</h2>
                <p class="text-body-md text-secondary">Thiết bị hiện đại và đáng tin cậy cho mọi quy mô dự án</p>

                @if($categories->count())
                    <div class="mt-stack-lg flex flex-wrap justify-center gap-stack-sm">
                        @foreach($categories->take(6) as $index => $category)
                            <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                               class="{{ $index === 0 ? 'bg-primary text-white' : 'bg-surface-container text-secondary hover:bg-primary/10' }} px-6 py-2 rounded-full text-label-bold transition-colors">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Featured Products -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                @forelse($featuredProducts->take(3) as $product)
                    @php
                        $productImage = $product->image
                            ? asset('storage/' . $product->image)
                            : 'https://via.placeholder.com/800x500?text=No+Image';

                        $productPrice = null;
                        if (isset($product->price) && $product->price) {
                            $productPrice = number_format($product->price, 0, ',', '.') . ' đ';
                        }

                        $spec1 = $product->engine_power ?? $product->cong_suat_dong_co ?? $product->model_engine ?? null;
                        $spec2 = $product->bucket_capacity ?? $product->trong_luong_may ?? $product->tai_trong_nang ?? null;
                    @endphp

                    <div class="bg-white border border-outline-variant/30 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow group">
                        <div class="p-stack-md aspect-video">
                            <img alt="{{ $product->name }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform" src="{{ $productImage }}">
                        </div>
                        <div class="p-stack-md border-t border-outline-variant/20">
                            <h3 class="text-headline-md font-headline-md mb-stack-xs line-clamp-2">
                                {{ $product->name }}
                            </h3>

                            <div class="grid grid-cols-2 gap-stack-sm mb-stack-md text-secondary text-sm">
                                <p>{{ $spec1 ? 'Thông số: ' . $spec1 : 'Model: ' . ($product->model ?? 'Đang cập nhật') }}</p>
                                <p>{{ $spec2 ? 'Chi tiết: ' . $spec2 : 'Danh mục: ' . ($product->category->name ?? 'Đang cập nhật') }}</p>
                            </div>

                            <div class="flex justify-between items-center gap-3">
                                <div>
                                    <p class="text-xs text-secondary">Giá</p>
                                    <p class="text-headline-md text-primary">
                                        {{ $productPrice ?? 'Liên hệ' }}
                                    </p>
                                </div>

                                <a href="{{ route('products.show', $product->slug) }}"
                                   class="mt-stack-lg bg-yellow-400 text-gray-900 py-3 px-8 rounded-lg font-label-bold inline-flex items-center gap-2 hover:bg-yellow-300 hover:scale-105 active:scale-95 transition-all">
                                    Chi Tiết
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    @for($i = 0; $i < 3; $i++)
                        <div class="bg-white border border-outline-variant/30 rounded-xl overflow-hidden shadow-sm">
                            <div class="p-stack-md aspect-video flex items-center justify-center bg-surface-container-low text-secondary">
                                Chưa có sản phẩm nổi bật
                            </div>
                            <div class="p-stack-md border-t border-outline-variant/20">
                                <h3 class="text-headline-md font-headline-md mb-stack-xs">Đang cập nhật</h3>
                                <div class="grid grid-cols-2 gap-stack-sm mb-stack-md text-secondary text-sm">
                                    <p>Thông số: --</p>
                                    <p>Giá: --</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endforelse
            </div>

            <div class="text-center mt-section-gap">
                <a href="{{ route('products.index') }}" class="border-2 border-primary-container text-primary font-headline-md py-3 px-10 rounded-lg inline-flex items-center gap-2 hover:bg-primary-container hover:text-white transition-all group">
                    Xem tất cả sản phẩm
                    <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Industry Sectors -->
    <section class="py-section-gap bg-surface-container-low">
        <div class="w-full px-gutter md:px-section-gap max-w-container-max mx-auto">
            <div class="mb-stack-lg">
                <h2 class="text-headline-lg font-headline-lg">Phục Vụ Các Ngành Công Nghiệp</h2>
                <p class="text-body-md text-secondary max-w-2xl">
                    Được chế tạo cho những nhu cầu khắc nghiệt nhất, được các doanh nghiệp và công trình trên toàn quốc tin tưởng.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-stack-md h-auto md:h-[600px]">
                @php $industryPostsList = isset($industryPosts) ? $industryPosts->values() : collect(); @endphp

                @if($industryPostsList->count() > 0)
                    @php
                        $post1 = $industryPostsList->get(0);
                        $img1 = $post1->image ? asset('storage/' . $post1->image) : 'https://via.placeholder.com/600x800?text=No+Image';
                    @endphp
                    <a href="{{ route('news.show', $post1->slug) }}" class="relative rounded-2xl overflow-hidden group block">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                             style="background-image: url('{{ $img1 }}')"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-stack-lg text-white w-full">
                            <h4 class="text-headline-md font-headline-md mb-2 line-clamp-2">{{ $post1->title }}</h4>
                            <p class="text-sm opacity-80 mb-4 line-clamp-2">{{ \Illuminate\Support\Str::limit(strip_tags($post1->excerpt ?? $post1->content ?? ''), 80) }}</p>
                            <span class="material-symbols-outlined border border-white rounded-full p-2 group-hover:bg-primary group-hover:border-primary transition-colors">arrow_outward</span>
                        </div>
                    </a>
                @endif

                <div class="grid grid-rows-2 gap-stack-md">
                    @if($industryPostsList->count() > 1)
                        @php
                            $post2 = $industryPostsList->get(1);
                            $img2 = $post2->image ? asset('storage/' . $post2->image) : 'https://via.placeholder.com/600x400?text=No+Image';
                        @endphp
                        <a href="{{ route('news.show', $post2->slug) }}" class="relative rounded-2xl overflow-hidden group block">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                                 style="background-image: url('{{ $img2 }}')"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-stack-md text-white w-full">
                                <h4 class="text-headline-md font-headline-md line-clamp-1">{{ $post2->title }}</h4>
                                <span class="material-symbols-outlined border border-white rounded-full p-1 text-sm mt-2 group-hover:bg-primary group-hover:border-primary transition-colors">arrow_outward</span>
                            </div>
                        </a>
                    @endif

                    @if($industryPostsList->count() > 2)
                        @php
                            $post3 = $industryPostsList->get(2);
                            $img3 = $post3->image ? asset('storage/' . $post3->image) : 'https://via.placeholder.com/600x400?text=No+Image';
                        @endphp
                        <a href="{{ route('news.show', $post3->slug) }}" class="relative rounded-2xl overflow-hidden group block">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                                 style="background-image: url('{{ $img3 }}')"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-stack-md text-white w-full">
                                <h4 class="text-headline-md font-headline-md line-clamp-1">{{ $post3->title }}</h4>
                                <span class="material-symbols-outlined border border-white rounded-full p-1 text-sm mt-2 group-hover:bg-primary group-hover:border-primary transition-colors">arrow_outward</span>
                            </div>
                        </a>
                    @endif
                </div>

                @if($industryPostsList->count() > 3)
                    @php
                        $post4 = $industryPostsList->get(3);
                        $img4 = $post4->image ? asset('storage/' . $post4->image) : 'https://via.placeholder.com/600x800?text=No+Image';
                    @endphp
                    <a href="{{ route('news.show', $post4->slug) }}" class="relative rounded-2xl overflow-hidden group block">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                             style="background-image: url('{{ $img4 }}')"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-stack-lg text-white w-full">
                            <h4 class="text-headline-md font-headline-md mb-2 line-clamp-2">{{ $post4->title }}</h4>
                            <p class="text-sm opacity-80 mb-4 line-clamp-2">{{ \Illuminate\Support\Str::limit(strip_tags($post4->excerpt ?? $post4->content ?? ''), 80) }}</p>
                            <span class="material-symbols-outlined border border-white rounded-full p-2 group-hover:bg-primary group-hover:border-primary transition-colors">arrow_outward</span>
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <a href="{{ route('about') }}"
   class="mt-stack-lg bg-yellow-400 text-gray-900 py-3 px-8 rounded-lg font-label-bold inline-flex items-center gap-2 hover:bg-yellow-300 hover:scale-105 active:scale-95 transition-all">
    Khám phá thêm
    <span class="material-symbols-outlined">arrow_outward</span>
</a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-section-gap bg-surface-container-high/30">
        <div class="w-full px-gutter md:px-section-gap max-w-container-max mx-auto">
            <div class="text-center mb-section-gap">
                <h2 class="text-headline-lg font-headline-lg">Khách Hàng Nói Gì Về Chúng Tôi</h2>
                <p class="text-body-md text-secondary">Sự tin tưởng từ khách hàng là minh chứng cho chất lượng dịch vụ.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                @php
                    $testimonials = $company['testimonials'] ?? [
                        [
                            'name' => 'Anh Nguyễn Văn Dũng',
                            'position' => 'Quản lý dự án',
                            'company' => 'Apex Construction',
                            'content' => 'Thiết bị của Tâm Phúc Group vận hành bền bỉ, ít hỏng hóc và đội ngũ hỗ trợ rất nhanh chóng.',
                            'rating' => 5,
                        ],
                        [
                            'name' => 'Chị Hoàng Linh',
                            'position' => 'Giám đốc vận hành',
                            'company' => 'Peak Builders',
                            'content' => 'Chất lượng sản phẩm và dịch vụ sau bán hàng rất tốt, hỗ trợ kỹ thuật rõ ràng và kịp thời.',
                            'rating' => 5,
                        ],
                        [
                            'name' => 'Anh Lê Minh Khoa',
                            'position' => 'Kỹ sư trưởng',
                            'company' => 'BuildPro Group',
                            'content' => 'Đội ngũ kỹ thuật chuyên nghiệp, hỗ trợ nhanh, chúng tôi hoàn toàn an tâm khi hợp tác.',
                            'rating' => 5,
                        ],
                    ];
                @endphp

                @foreach($testimonials as $testimonial)
                    <div class="bg-white p-stack-lg rounded-xl shadow-sm border border-outline-variant/20">
                        <div class="flex text-primary mb-stack-md">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' {{ $i <= ($testimonial['rating'] ?? 5) ? 1 : 0 }};">star</span>
                            @endfor
                        </div>

                        <p class="italic text-secondary mb-stack-lg">
                            "{{ $testimonial['content'] }}"
                        </p>

                        <div class="flex items-center gap-stack-md">
                            <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary font-bold">
                                {{ strtoupper(mb_substr($testimonial['name'], 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-bold">{{ $testimonial['name'] }}</p>
                                <p class="text-xs text-secondary">
                                    {{ $testimonial['position'] }}{{ !empty($testimonial['company']) ? ', ' . $testimonial['company'] : '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- News & Articles -->
    <section class="py-section-gap">
        <div class="w-full px-gutter md:px-section-gap max-w-container-max mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-stack-lg">
                <div>
                    <h2 class="text-headline-lg font-headline-lg">Tin tức của chúng tôi</h2>
                    <p class="text-body-md text-secondary">Cập nhật xu hướng và thông tin mới nhất trong ngành máy móc công trình.</p>
                </div>
                <a href="{{ route('news.index') }}" class="text-primary font-label-bold flex items-center gap-1 hover:underline mt-stack-md md:mt-0">
                    Xem tất cả bài viết
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
                <!-- Main Featured Article -->
                <div class="md:col-span-7 bg-white rounded-xl overflow-hidden shadow-sm border border-outline-variant/20 group">
                    @if($featuredPost)
                        @php
                            $featuredPostImage = $featuredPost->image
                                ? asset('storage/' . $featuredPost->image)
                                : 'https://via.placeholder.com/1200x700?text=No+Image';
                        @endphp

                        <a href="{{ route('news.show', $featuredPost->slug) }}" class="block">
                            <div class="h-64 relative overflow-hidden">
                                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $featuredPostImage }}" alt="{{ $featuredPost->title }}">
                            </div>
                            <div class="p-stack-lg">
                                <p class="text-label-bold text-primary mb-2">
                                    {{ $featuredPost->category->name ?? 'TIN TỨC' }}
                                </p>
                                <h3 class="text-headline-md font-headline-md mb-stack-md">
                                    {{ $featuredPost->title }}
                                </h3>
                                <p class="text-secondary mb-stack-lg">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($featuredPost->excerpt ?? $featuredPost->content ?? ''), 160) }}
                                </p>
                                <div class="flex items-center gap-stack-lg text-xs text-secondary">
                                    <span class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">calendar_today</span>
                                        {{ $featuredPost->created_at?->format('d/m/Y') }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    @else
                        <div class="p-stack-lg">
                            <h3 class="text-headline-md font-headline-md">Chưa có bài viết nổi bật</h3>
                        </div>
                    @endif
                </div>

                <!-- Side Articles List -->
                <div class="md:col-span-5 space-y-stack-md">
                    @forelse($latestPosts->take(3) as $post)
                        @php
                            $postImage = $post->image
                                ? asset('storage/' . $post->image)
                                : 'https://via.placeholder.com/300x300?text=No+Image';
                        @endphp

                        <a href="{{ route('news.show', $post->slug) }}"
                           class="flex gap-stack-md p-stack-sm hover:bg-surface-container transition-colors rounded-lg group {{ !$loop->first ? 'border-t border-outline-variant/10' : '' }}">
                            <div class="w-24 h-24 shrink-0 rounded-lg overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ $postImage }}" alt="{{ $post->title }}">
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1 group-hover:text-primary line-clamp-2">
                                    {{ $post->title }}
                                </h4>
                                <p class="text-xs text-secondary">
                                    {{ $post->created_at?->format('d/m/Y') }}
                                </p>
                            </div>
                        </a>
                    @empty
                        <div class="text-secondary">Chưa có bài viết mới.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

  <!-- CTA Banner -->
<section class="py-section-gap">
    <div class="w-full px-gutter md:px-section-gap max-w-container-max mx-auto">
        <div class="relative bg-on-background rounded-3xl overflow-hidden p-stack-lg md:p-section-gap text-center text-white">
            <div class="absolute inset-0 opacity-20 pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-br from-primary via-transparent to-primary-container"></div>
            </div>
            <div class="relative z-10 max-w-3xl mx-auto">
                <h2 class="text-headline-xl text-headline-xl-mobile md:text-headline-xl mb-stack-md">
                    Sẵn Sàng Nâng Tầm Dự Án Của Bạn?
                </h2>
                <p class="text-body-lg opacity-80 mb-stack-lg">
                    Liên hệ với đội ngũ chuyên gia của chúng tôi ngay hôm nay để nhận báo giá và tư vấn thiết bị phù hợp nhất.
                </p>
                <div class="flex flex-wrap justify-center gap-stack-md">
                   <a href="{{ route('contact') }}"
   class="bg-yellow-400 text-gray-900 py-4 px-10 rounded-lg font-headline-md flex items-center gap-2 hover:bg-yellow-300 hover:scale-105 active:scale-95 transition-all shadow-lg">
    Liên Hệ Tư Vấn
    <span class="material-symbols-outlined">call</span>
</a>

                    <a href="{{ route('products.index') }}" class="border-2 border-white/30 text-white py-4 px-10 rounded-lg font-headline-md hover:bg-white hover:text-on-background transition-all">
                        Xem sản phẩm
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
