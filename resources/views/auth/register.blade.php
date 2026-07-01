@extends('layouts.main')

@section('title', 'Đăng Ký')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24 min-h-[80vh] flex items-center justify-center relative overflow-hidden">
    <!-- Decorative background -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-brand-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute bottom-1/3 left-1/4 w-96 h-96 bg-brand-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    </div>

    <div class="max-w-md w-full bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl shadow-brand-500/5 border border-white p-8 sm:p-10 relative z-10">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-brand-50 mb-4">
                <svg class="w-8 h-8 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            </div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Đăng Ký Tài Khoản</h1>
            <p class="text-gray-500 mt-2 font-medium">Tạo tài khoản để theo dõi lịch sử mua hàng</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf
            
            <div class="space-y-1">
                <label class="block text-sm font-bold text-gray-700">Họ tên</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <input type="text" name="name" required value="{{ old('name') }}" class="block w-full pl-11 rounded-2xl border-gray-300 py-3.5 px-4 bg-white/50 focus:bg-white focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all border text-gray-900" placeholder="Nhập họ tên của bạn">
                </div>
                @error('name') <span class="text-red-500 text-xs font-medium">{{ $message }}</span> @enderror
            </div>

            <div class="space-y-1">
                <label class="block text-sm font-bold text-gray-700">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                    </div>
                    <input type="email" name="email" required value="{{ old('email') }}" class="block w-full pl-11 rounded-2xl border-gray-300 py-3.5 px-4 bg-white/50 focus:bg-white focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all border text-gray-900" placeholder="Nhập email của bạn">
                </div>
                @error('email') <span class="text-red-500 text-xs font-medium">{{ $message }}</span> @enderror
            </div>

            <div class="space-y-1">
                <label class="block text-sm font-bold text-gray-700">Mật khẩu</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <input type="password" name="password" required class="block w-full pl-11 rounded-2xl border-gray-300 py-3.5 px-4 bg-white/50 focus:bg-white focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all border text-gray-900" placeholder="••••••••">
                </div>
                @error('password') <span class="text-red-500 text-xs font-medium">{{ $message }}</span> @enderror
            </div>

            <div class="space-y-1">
                <label class="block text-sm font-bold text-gray-700">Xác nhận mật khẩu</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <input type="password" name="password_confirmation" required class="block w-full pl-11 rounded-2xl border-gray-300 py-3.5 px-4 bg-white/50 focus:bg-white focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all border text-gray-900" placeholder="••••••••">
                </div>
            </div>

            <button type="submit" class="w-full mt-8 py-4 px-4 bg-brand-600 text-white rounded-2xl font-bold text-lg hover:bg-brand-700 shadow-lg shadow-brand-500/30 transition-all transform hover:-translate-y-1">
                Hoàn Tất Đăng Ký
            </button>
        </form>

        <p class="mt-8 text-center text-gray-600">
            Đã có tài khoản? <a href="{{ route('login') }}" class="text-brand-600 font-bold hover:text-brand-700 hover:underline transition-colors">Đăng nhập ngay</a>
        </p>
    </div>
</div>
@endsection
