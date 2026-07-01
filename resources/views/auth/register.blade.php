@extends('layouts.main')

@section('title', 'Đăng Ký')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24 min-h-[70vh] flex items-center justify-center">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Đăng Ký Tài Khoản</h1>
            <p class="text-gray-500 mt-2">Tạo tài khoản để theo dõi lịch sử mua hàng</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Họ tên</label>
                <input type="text" name="name" required value="{{ old('name') }}" class="mt-1 block w-full rounded-xl border-gray-300 py-3 px-4 border focus:ring-brand-500 focus:border-brand-500">
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}" class="mt-1 block w-full rounded-xl border-gray-300 py-3 px-4 border focus:ring-brand-500 focus:border-brand-500">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                <input type="password" name="password" required class="mt-1 block w-full rounded-xl border-gray-300 py-3 px-4 border focus:ring-brand-500 focus:border-brand-500">
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Xác nhận mật khẩu</label>
                <input type="password" name="password_confirmation" required class="mt-1 block w-full rounded-xl border-gray-300 py-3 px-4 border focus:ring-brand-500 focus:border-brand-500">
            </div>

            <button type="submit" class="w-full mt-6 py-3 px-4 bg-brand-600 text-white rounded-xl font-medium hover:bg-brand-700 transition-colors whitespace-nowrap">Đăng Ký</button>
        </form>

        <p class="mt-6 text-center text-gray-600">
            Đã có tài khoản? <a href="{{ route('login') }}" class="text-brand-600 font-medium hover:underline">Đăng nhập</a>
        </p>
    </div>
</div>
@endsection
