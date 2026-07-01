@extends('layouts.main')

@section('title', 'Liên Hệ - Thế Giới Máy Xây Dựng')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Liên Hệ Với Chúng Tôi</h1>
            <p class="mt-4 text-lg text-gray-500">Đội ngũ chuyên gia của chúng tôi luôn sẵn lòng tư vấn và giải đáp mọi thắc mắc của bạn về thiết bị và dịch vụ.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Form -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 lg:p-12">
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Họ và tên *</label>
                        <input type="text" name="name" id="name" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 py-3 px-4 border" placeholder="Nhập họ tên của bạn">
                        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại *</label>
                        <input type="tel" name="phone" id="phone" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 py-3 px-4 border" placeholder="Nhập số điện thoại">
                        @error('phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email (Tuỳ chọn)</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 py-3 px-4 border" placeholder="Nhập email">
                        @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Nội dung *</label>
                        <textarea name="message" id="message" rows="4" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 py-3 px-4 border" placeholder="Bạn cần tư vấn dòng máy nào?"></textarea>
                        @error('message')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-sm text-base font-medium text-white bg-brand-600 hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500">
                        Gửi Yêu Cầu
                    </button>
                </form>
            </div>

            <!-- Info -->
            <div class="flex flex-col justify-center space-y-10">
                <div class="bg-brand-900 rounded-3xl p-8 lg:p-12 text-white shadow-xl relative overflow-hidden">
                    <div class="absolute -top-24 -right-24 w-48 h-48 bg-brand-600 rounded-full blur-3xl opacity-50"></div>
                    <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-brand-500 rounded-full blur-3xl opacity-50"></div>
                    
                    <h3 class="text-2xl font-bold mb-8 relative z-10">Thông tin liên hệ</h3>
                    
                    <dl class="space-y-6 relative z-10">
                        <div class="flex items-start">
                            <dt class="mt-1">
                                <svg class="h-6 w-6 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </dt>
                            <dd class="ml-4 text-base text-gray-300">
                                <span class="block font-bold text-white mb-1">Trụ sở chính</span>
                                Tòa nhà Xây Dựng, Số 1 Đường Phạm Hùng,<br>
                                Nam Từ Liêm, Hà Nội, Việt Nam
                            </dd>
                        </div>
                        
                        <div class="flex items-start">
                            <dt class="mt-1">
                                <svg class="h-6 w-6 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </dt>
                            <dd class="ml-4 text-base text-gray-300">
                                <span class="block font-bold text-white mb-1">Hotline tư vấn</span>
                                0988.xxx.xxx
                            </dd>
                        </div>
                        
                        <div class="flex items-start">
                            <dt class="mt-1">
                                <svg class="h-6 w-6 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </dt>
                            <dd class="ml-4 text-base text-gray-300">
                                <span class="block font-bold text-white mb-1">Email</span>
                                contact@tamphucgroup.vn
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
