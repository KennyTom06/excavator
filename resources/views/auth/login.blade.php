@extends('layouts.main')

@section('title', 'Đăng Nhập')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24 min-h-[80vh] flex items-center justify-center relative overflow-hidden">
    <!-- Decorative background -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-brand-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-1/3 right-1/4 w-96 h-96 bg-brand-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    </div>

    <div class="max-w-md w-full bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl shadow-brand-500/5 border border-white p-8 sm:p-10 relative z-10">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-brand-50 mb-4">
                <svg class="w-8 h-8 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
            </div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Đăng Nhập</h1>
            <p class="text-gray-500 mt-2 font-medium">Truy cập để quản lý đơn hàng của bạn</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 p-4 rounded-2xl text-sm flex items-start">
                    <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <div class="space-y-1">
                <label class="block text-sm font-bold text-gray-700">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                    </div>
                    <input type="email" name="email" required class="block w-full pl-11 rounded-2xl border-gray-300 py-3.5 px-4 bg-white/50 focus:bg-white focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all border text-gray-900" placeholder="Nhập email của bạn">
                </div>
            </div>

            <div class="space-y-1">
                <label class="block text-sm font-bold text-gray-700">Mật khẩu</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <input type="password" name="password" required class="block w-full pl-11 rounded-2xl border-gray-300 py-3.5 px-4 bg-white/50 focus:bg-white focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all border text-gray-900" placeholder="••••••••">
                </div>
            </div>

            <button type="submit" class="w-full py-4 px-4 bg-brand-600 text-white rounded-2xl font-bold text-lg hover:bg-brand-700 shadow-lg shadow-brand-500/30 transition-all transform hover:-translate-y-1 mt-8">
                Đăng Nhập
            </button>
        </form>

        <p class="mt-8 text-center text-gray-600">
            Chưa có tài khoản? <a href="{{ route('register') }}" class="text-brand-600 font-bold hover:text-brand-700 hover:underline transition-colors">Đăng ký ngay</a>
        </p>
    </div>
</div>
@endsection
