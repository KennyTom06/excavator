<!DOCTYPE html>
<html class="scroll-smooth" lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', config('company.name', 'Tâm Phúc Group') . ' - ' . config('company.tagline', 'Đối Tác Tin Cậy Mọi Công Trình'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Manrope:wght@400;600;700;800&family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#B08A4E",
                        "on-primary": "#ffffff",
                        "primary-container": "#f1e5d1",
                        "on-primary-container": "#3d2b0e",
                        "secondary": "#0F2A2E",
                        "on-secondary": "#ffffff",
                        "secondary-container": "#cce8ec",
                        "on-secondary-container": "#051f22",
                        "tertiary": "#52634f",
                        "on-tertiary": "#ffffff",
                        "tertiary-container": "#d5e8cf",
                        "on-tertiary-container": "#111f0f",
                        "error": "#ba1a1a",
                        "on-error": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-error-container": "#410002",
                        "background": "#fbfcf8",
                        "on-background": "#191c1b",
                        "surface": "#fbfcf8",
                        "on-surface": "#191c1b",
                        "surface-variant": "#e1e3de",
                        "on-surface-variant": "#444844",
                        "outline": "#747974",
                        "outline-variant": "#c4c7c2",
                        "inverse-surface": "#2e3130",
                        "inverse-on-surface": "#f0f1ec",
                        "inverse-primary": "#ffb694",
                        "surface-container-low": "#f5f6f1",
                        "surface-container": "#eff0eb",
                        "surface-container-high": "#e9ebe5",
                        "surface-container-highest": "#e3e5e0",
                        "brand": {
                            50: "#fcf8f2",
                            100: "#f7ecd9",
                            200: "#f1dcbc",
                            300: "#eac99c",
                            400: "#e3b47c",
                            500: "#B08A4E",
                            600: "#94713c",
                            700: "#76592d",
                            800: "#5a421f",
                            900: "#3d2b0e"
                        }
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },
                    spacing: {
                        "stack-sm": "8px",
                        "stack-md": "16px",
                        "container-max": "1280px",
                        "stack-lg": "32px",
                        "section-gap": "80px",
                        "stack-xs": "4px",
                        "gutter": "24px"
                    },
                    fontFamily: {
                        "headline-md": ["Montserrat"],
                        "headline-lg": ["Montserrat"],
                        "body-lg": ["Inter"],
                        "headline-xl": ["Montserrat"],
                        "body-md": ["Inter"],
                        "label-bold": ["Inter"],
                        "headline-xl-mobile": ["Montserrat"],
                        "numbers": ["Manrope"]
                    },
                    fontSize: {
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "800"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "fontWeight": "800"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "headline-xl": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "label-bold": ["14px", {"lineHeight": "20px", "fontWeight": "600"}],
                        "headline-xl-mobile": ["32px", {"lineHeight": "40px", "fontWeight": "800"}]
                    }
                },
            },
        }
    </script>

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .bg-hero-overlay {
            background: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.2) 50%, rgba(0,0,0,0.7));
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md overflow-x-hidden flex flex-col min-h-screen">
@php
    $company = config('company');

    $companyName = $company['name'] ?? 'Tâm Phúc Group';
    $companySlogan = $company['tagline'] ?? 'Đối Tác Tin Cậy Mọi Công Trình';
    $companyDescription = $company['description'] ?? 'Cung cấp giải pháp thiết bị công nghiệp nặng bền bỉ với dịch vụ hậu mãi chuyên nghiệp hàng đầu tại Việt Nam.';
    
    // Contact Info from config
    $companyPhoneDisplay = $company['contact']['phone_display'] ?? '';
    $companyPhoneCall = $company['contact']['phone_call'] ?? '';
    $companyEmail = $company['contact']['email'] ?? '';
    $companyFacebook = $company['contact']['facebook_url'] ?? '';
    $companyZaloDisplay = $company['contact']['zalo_display'] ?? '';
    $companyZaloUrl = $company['contact']['zalo_url'] ?? '';
    $companyAddress = $company['contact']['address'] ?? '';
    $companyLogo = $company['logo'] ?? null;

    $zaloLink = $companyZaloUrl;
    $phoneLink = $companyPhoneCall ? 'tel:' . preg_replace('/\s+/', '', $companyPhoneCall) : null;
    $emailLink = $companyEmail ? 'mailto:' . $companyEmail : null;
    $phoneDisplay = $companyPhoneDisplay;

    // Default categories if not passed
    $categories = $categories ?? \App\Models\Category::all() ?? collect();
@endphp

<!-- TopNavBar -->
<header class="bg-surface/90 backdrop-blur-md border-b border-outline-variant/30 shadow-sm docked full-width top-0 sticky z-50">
    <nav class="flex justify-between items-center w-full px-gutter md:px-section-gap max-w-container-max mx-auto py-stack-md">
        <div class="flex items-center gap-3">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                @if($companyLogo)
                    <img src="{{ asset($companyLogo) }}" alt="{{ $companyName }}" class="h-10 w-auto object-contain">
                @endif
                <div class="text-headline-md font-headline-md font-extrabold text-primary">
                    {{ $companyName }}
                </div>
            </a>
        </div>

        <ul class="hidden md:flex items-center gap-stack-lg">
            <li class="text-primary font-bold border-b-2 border-primary pb-1">
                <a href="{{ route('home') }}">Trang chủ</a>
            </li>

            @foreach($categories->take(6) as $category)
                <li class="text-secondary hover:text-primary transition-colors">
                    <a href="{{ route('products.index', ['category' => $category->slug]) }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach

            <li class="relative group">
                <button class="text-secondary hover:text-primary transition-colors flex items-center gap-1">
                    Giới thiệu
                    <span class="material-symbols-outlined text-[18px]">expand_more</span>
                </button>

                <div class="absolute top-full left-0 mt-2 min-w-[220px] bg-white rounded-xl shadow-lg border border-outline-variant/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                    <a href="{{ route('about') }}" class="block px-4 py-3 hover:bg-surface-container-low transition-colors">
                        Về chúng tôi
                    </a>
                    <a href="{{ route('news.index') }}" class="block px-4 py-3 hover:bg-surface-container-low transition-colors">
                        Tin tức
                    </a>
                    <a href="{{ route('contact') }}" class="block px-4 py-3 hover:bg-surface-container-low transition-colors rounded-b-xl">
                        Liên hệ
                    </a>
                </div>
            </li>
        </ul>

        <div class="flex items-center gap-stack-md">
            @auth
                <div class="relative group">
                    <button class="flex items-center gap-2 text-primary font-label-bold py-2 px-4 hover:bg-surface-container-low transition-all focus:outline-none rounded-lg">
                        {{ Auth::user()->name }}
                        <span class="material-symbols-outlined text-[18px]">expand_more</span>
                    </button>
                    <div class="absolute right-0 top-full mt-2 w-48 bg-white rounded-xl shadow-lg border border-outline-variant/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                        <a href="{{ route('orders.index') }}" class="block px-4 py-3 text-sm hover:bg-surface-container-low transition-colors rounded-t-xl">
                            Lịch sử đơn hàng
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-3 text-sm text-error hover:bg-error-container hover:text-on-error-container transition-colors rounded-b-xl border-t border-outline-variant/10">
                                Đăng xuất
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-secondary hover:text-primary font-label-bold py-2 px-4 hover:bg-surface-container-low transition-all rounded-lg">
                    Đăng nhập
                </a>
            @endauth

            <a href="{{ route('cart.index') }}" class="relative text-secondary hover:text-primary transition-colors flex items-center p-2 rounded-full hover:bg-surface-container-low">
                <span class="material-symbols-outlined">shopping_cart</span>
                @if(session('cart') && count(session('cart')) > 0)
                    <span class="absolute 0 right-0 bg-error text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full shadow-sm translate-x-1 -translate-y-1">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </a>

            <a href="{{ route('products.index') }}" class="bg-primary text-white font-label-bold py-2 px-6 rounded-lg hover:bg-primary/90 hover:scale-105 active:scale-90 transition-all shadow-sm hidden sm:block">
                Sản phẩm
            </a>

            <button id="mobile-menu-btn" class="md:hidden flex items-center p-2 rounded-lg hover:bg-surface-container-low text-secondary transition-colors">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </nav>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-surface shadow-lg border-t border-outline-variant/20 flex-col max-h-[80vh] overflow-y-auto">
        <a href="{{ route('home') }}" class="px-6 py-4 border-b border-outline-variant/10 text-secondary font-bold hover:bg-surface-container-low transition-colors">Trang chủ</a>
        @foreach($categories->take(6) as $category)
            <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="px-6 py-4 border-b border-outline-variant/10 text-secondary hover:bg-surface-container-low transition-colors">{{ $category->name }}</a>
        @endforeach
        <a href="{{ route('about') }}" class="px-6 py-4 border-b border-outline-variant/10 text-secondary hover:bg-surface-container-low transition-colors">Về chúng tôi</a>
        <a href="{{ route('news.index') }}" class="px-6 py-4 border-b border-outline-variant/10 text-secondary hover:bg-surface-container-low transition-colors">Tin tức</a>
        <a href="{{ route('contact') }}" class="px-6 py-4 border-b border-outline-variant/10 text-secondary hover:bg-surface-container-low transition-colors">Liên hệ</a>
        
        <div class="px-6 py-6 border-b border-outline-variant/10">
            <a href="{{ route('products.index') }}" class="block w-full text-center bg-primary text-white font-label-bold py-3 px-6 rounded-lg hover:bg-primary/90 transition-colors shadow-sm">
                Sản phẩm
            </a>
        </div>
    </div>
</header>

<!-- SideNavBar (Floating Contact) -->
<aside class="fixed right-4 bottom-24 z-50">
    <div class="flex flex-col items-center gap-3 bg-secondary rounded-full py-4 px-3 shadow-xl border border-primary/20">
        <a href="{{ route('cart.index') }}"
           class="relative w-11 h-11 rounded-full bg-white/5 hover:bg-primary/20 text-primary flex items-center justify-center transition-all hover:scale-110"
           title="Giỏ hàng" aria-label="Giỏ hàng">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">shopping_cart</span>
            @if(session('cart') && count(session('cart')) > 0)
                <span class="absolute 0 right-0 bg-error text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full shadow-sm translate-x-1 -translate-y-1">
                    {{ count(session('cart')) }}
                </span>
            @endif
        </a>

        @if($zaloLink)
            <a href="{{ $zaloLink }}" target="_blank" rel="noopener noreferrer"
               class="w-11 h-11 rounded-full bg-white/5 hover:bg-primary/20 text-primary flex items-center justify-center transition-all hover:scale-110"
               title="Zalo" aria-label="Zalo">
                <span class="text-sm font-bold">Zalo</span>
            </a>
        @endif

        @if($phoneLink)
            <a href="{{ $phoneLink }}"
               class="w-11 h-11 rounded-full bg-white/5 hover:bg-primary/20 text-primary flex items-center justify-center transition-all hover:scale-110"
               title="Gọi điện" aria-label="Gọi điện">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">call</span>
            </a>
        @endif

        <a href="{{ route('contact') }}"
           class="w-11 h-11 rounded-full bg-white/5 hover:bg-primary/20 text-primary flex items-center justify-center transition-all hover:scale-110"
           title="Liên hệ" aria-label="Liên hệ">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">contact_support</span>
        </a>

        @if($companyFacebook)
            <a href="{{ $companyFacebook }}" target="_blank" rel="noopener noreferrer"
               class="w-11 h-11 rounded-full bg-white/5 hover:bg-primary/20 text-primary flex items-center justify-center transition-all hover:scale-110"
               title="Facebook" aria-label="Facebook">
                <i class="fa-brands fa-facebook-f text-lg"></i>
            </a>
        @endif
    </div>
</aside>

<main class="flex-grow">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-[#0F2A2E] text-surface py-section-gap mt-auto">
    <div class="grid grid-cols-2 md:grid-cols-5 gap-gutter w-full px-gutter md:px-section-gap max-w-container-max mx-auto">
        <div class="col-span-2 md:col-span-2">
            <div class="text-headline-md font-headline-md text-surface mb-stack-md flex items-center gap-3">
                @if($companyLogo)
                    <img src="{{ asset($companyLogo) }}" alt="{{ $companyName }}" class="h-10 w-auto bg-white p-1 rounded-lg">
                @endif
                {{ $companyName }}
            </div>

            <p class="text-surface-variant mb-stack-lg max-w-xs">
                {{ $companyDescription }}
            </p>

            <div class="flex items-center gap-stack-md mb-stack-lg">
                @if($companyFacebook)
                    <a class="w-10 h-10 bg-surface/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors"
                       href="{{ $companyFacebook }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f text-base"></i>
                    </a>
                @endif

                @if($zaloLink)
                    <a class="w-10 h-10 bg-surface/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors text-xs font-bold"
                       href="{{ $zaloLink }}" target="_blank" rel="noopener noreferrer" aria-label="Zalo">
                        Zalo
                    </a>
                @endif

                @if($emailLink)
                    <a class="w-10 h-10 bg-surface/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors"
                       href="{{ $emailLink }}" aria-label="Email">
                        <span class="material-symbols-outlined text-xl">mail</span>
                    </a>
                @endif
            </div>
        </div>

        <div>
            <h4 class="font-bold mb-stack-md">Danh mục</h4>
            <ul class="space-y-2 text-sm text-surface-variant">
                @foreach($categories->take(4) as $category)
                    <li class="hover:text-surface hover:translate-x-1 transition-all">
                        <a href="{{ route('products.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h4 class="font-bold mb-stack-md">Giới thiệu</h4>
            <ul class="space-y-2 text-sm text-surface-variant">
                <li class="hover:text-surface hover:translate-x-1 transition-all">
                    <a href="{{ route('about') }}">Về chúng tôi</a>
                </li>
                <li class="hover:text-surface hover:translate-x-1 transition-all">
                    <a href="{{ route('news.index') }}">Tin tức</a>
                </li>
                <li class="hover:text-surface hover:translate-x-1 transition-all">
                    <a href="{{ route('contact') }}">Liên hệ</a>
                </li>
            </ul>
        </div>

        <div>
            <h4 class="font-bold mb-stack-md">Liên hệ</h4>
            <ul class="space-y-2 text-sm text-surface-variant">
                @if($companyPhoneDisplay)
                    <li class="hover:text-surface transition-all">
                        <a href="{{ $phoneLink }}">{{ $companyPhoneDisplay }}</a>
                    </li>
                @endif

                @if($companyEmail)
                    <li class="hover:text-surface transition-all">
                        <a href="{{ $emailLink }}">{{ $companyEmail }}</a>
                    </li>
                @endif

                @if($companyFacebook)
                    <li class="hover:text-surface transition-all">
                        <a href="{{ $companyFacebook }}" target="_blank">Facebook</a>
                    </li>
                @endif

                @if($zaloLink)
                    <li class="hover:text-surface transition-all">
                        <a href="{{ $zaloLink }}" target="_blank">Zalo</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="border-t border-white/10 mt-stack-lg pt-stack-lg w-full px-gutter md:px-section-gap max-w-container-max mx-auto text-xs text-surface-variant flex flex-col md:flex-row justify-between items-center gap-4">
        <p>© {{ now()->year }} {{ $companyName }}. All Rights Reserved</p>
        <div class="flex gap-stack-lg">
            <a class="hover:text-surface transition-colors" href="{{ route('contact') }}">Liên hệ</a>
            <a class="hover:text-surface transition-colors" href="{{ route('about') }}">Giới thiệu</a>
        </div>
    </div>
</footer>

<script>
    window.addEventListener('scroll', () => {
        const header = document.querySelector('header');
        if (window.scrollY > 50) {
            header.classList.add('shadow-md');
        } else {
            header.classList.remove('shadow-md');
        }
    });

    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if(mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('flex');
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
            }
        });
    }
</script>
</body>
</html>
