<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Thế Giới Máy Xây Dựng - Cung Cấp Máy Xúc Cao Cấp')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/images/logo.png">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        },
                        colors: {
                            brand: {
                                50: '#fffbeb',
                                100: '#fef3c7',
                                500: '#f59e0b',
                                600: '#d97706',
                                900: '#78350f',
                            }
                        }
                    }
                }
            }
        </script>
    @endif
</head>
<body class="antialiased bg-gray-50 text-gray-900 font-sans selection:bg-brand-500 selection:text-white flex flex-col min-h-screen">

    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                        <img src="/images/logo.png" alt="Tâm Phúc Group" class="h-12 w-auto group-hover:scale-105 transition-transform drop-shadow-md">
                    </a>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-brand-600 font-medium transition-colors">Sản Phẩm</a>
                    <a href="{{ route('news.index') }}" class="text-gray-600 hover:text-brand-600 font-medium transition-colors">Tin Tức</a>
                    <a href="{{ route('about') }}" class="text-gray-600 hover:text-brand-600 font-medium transition-colors">Về Chúng Tôi</a>
                    <a href="{{ route('contact') }}" class="text-white bg-brand-600 hover:bg-brand-700 px-5 py-2 rounded-full font-medium transition-all shadow-md hover:shadow-lg">Liên Hệ</a>
                    
                    <div class="h-6 w-px bg-gray-200 mx-2"></div>
                    
                    <a href="{{ route('cart.index') }}" class="relative text-gray-600 hover:text-brand-600 transition-colors flex items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        @if(session('cart') && count(session('cart')) > 0)
                            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full shadow-sm">
                                {{ count(session('cart')) }}
                            </span>
                        @endif
                    </a>
                    
                    <div class="h-6 w-px bg-gray-200 mx-2"></div>

                    @auth
                        <div class="relative group">
                            <button class="flex items-center gap-2 text-gray-900 font-medium hover:text-brand-600 focus:outline-none">
                                {{ Auth::user()->name }}
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="absolute right-0 w-48 mt-2 bg-white rounded-xl shadow-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                <a href="{{ route('orders.index') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-600 rounded-t-xl">Lịch sử mua hàng</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 rounded-b-xl border-t border-gray-50">Đăng xuất</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-brand-600 font-bold hover:text-brand-700 transition-colors">Đăng Nhập</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 mt-auto">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-8 xl:col-span-1">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <img src="/images/logo.png" alt="Tâm Phúc Group" class="h-12 w-auto drop-shadow-md bg-white p-1 rounded-lg">
                    </a>
                    <p class="text-gray-400 text-base">
                        Nhà cung cấp máy xây dựng và thiết bị công trình hàng đầu Việt Nam. Đối tác tin cậy của mọi công trình.
                    </p>
                </div>
                <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Sản Phẩm</h3>
                            <ul class="mt-4 space-y-4">
                                <li><a href="{{ route('products.index', ['category' => 'may-xuc-dao']) }}" class="text-base text-gray-400 hover:text-white transition-colors">Máy Xúc Đào</a></li>
                                <li><a href="{{ route('products.index', ['category' => 'may-xuc-lat']) }}" class="text-base text-gray-400 hover:text-white transition-colors">Máy Xúc Lật</a></li>
                                <li><a href="{{ route('products.index', ['category' => 'may-ui']) }}" class="text-base text-gray-400 hover:text-white transition-colors">Máy Ủi</a></li>
                                <li><a href="#" class="text-base text-gray-400 hover:text-white transition-colors">Phụ tùng</a></li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Hỗ Trợ</h3>
                            <ul class="mt-4 space-y-4">
                                <li><a href="#" class="text-base text-gray-400 hover:text-white transition-colors">Tư vấn kỹ thuật</a></li>
                                <li><a href="#" class="text-base text-gray-400 hover:text-white transition-colors">Bảo hành bảo dưỡng</a></li>
                                <li><a href="#" class="text-base text-gray-400 hover:text-white transition-colors">Báo giá</a></li>
                                <li><a href="#" class="text-base text-gray-400 hover:text-white transition-colors">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-base text-gray-400 xl:text-center">
                    &copy; 2026 Tâm Phúc Group. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
