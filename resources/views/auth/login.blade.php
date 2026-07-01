@extends('layouts.main')

@section('title', 'Đăng Nhập')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24 min-h-[70vh] flex items-center justify-center">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Đăng Nhập Khách Hàng</h1>
            <p class="text-gray-500 mt-2">Truy cập để quản lý đơn hàng của bạn</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            @if($errors->any())
                <div class="bg-red-50 text-red-600 p-4 rounded-xl text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required class="mt-1 block w-full rounded-xl border-gray-300 py-3 px-4 border focus:ring-brand-500 focus:border-brand-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                <input type="password" name="password" required class="mt-1 block w-full rounded-xl border-gray-300 py-3 px-4 border focus:ring-brand-500 focus:border-brand-500">
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-brand-600 text-white rounded-xl font-medium hover:bg-brand-700 transition-colors whitespace-nowrap">Đăng Nhập</button>
        </form>

        <p class="mt-6 text-center text-gray-600">
            Chưa có tài khoản? <a href="{{ route('register') }}" class="text-brand-600 font-medium hover:underline">Đăng ký ngay</a>
        </p>
    </div>
</div>
@endsection
