@extends('layouts.main')

@section('title', 'Liên Hệ - Thế Giới Máy Xây Dựng')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24 relative overflow-hidden min-h-screen">
    <div class="absolute top-0 right-0 w-96 h-96 bg-brand-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-brand-600 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block py-1.5 px-4 rounded-full bg-brand-50 text-brand-700 text-xs font-black tracking-widest uppercase mb-4 border border-brand-100 shadow-sm">Kết Nối Với Chúng Tôi</span>
            <h1 class="text-4xl font-black text-gray-900 sm:text-5xl lg:text-6xl tracking-tight mb-6">Liên Hệ <span class="text-brand-600">Ngay</span></h1>
            <p class="text-xl text-gray-600 leading-relaxed">Đội ngũ chuyên gia của chúng tôi luôn sẵn lòng tư vấn và giải đáp mọi thắc mắc của bạn về thiết bị và dịch vụ.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Form -->
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8 sm:p-12">
                <h3 class="text-2xl font-black text-gray-900 mb-8 tracking-tight">Gửi yêu cầu trực tuyến</h3>
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl mb-8 flex items-start shadow-sm transform transition-all">
                        <svg class="w-6 h-6 mr-3 flex-shrink-0 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="font-bold">{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Họ và tên *</label>
                        <input type="text" name="name" id="name" required class="block w-full rounded-2xl border-gray-200 bg-gray-50 shadow-sm focus:border-brand-500 focus:ring-brand-500 py-4 px-5 text-gray-900 font-medium transition-colors" placeholder="Nhập họ tên của bạn">
                        @error('name')<p class="text-red-500 text-sm font-bold mt-2">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Số điện thoại *</label>
                        <input type="tel" name="phone" id="phone" required class="block w-full rounded-2xl border-gray-200 bg-gray-50 shadow-sm focus:border-brand-500 focus:ring-brand-500 py-4 px-5 text-gray-900 font-medium transition-colors" placeholder="Nhập số điện thoại">
                        @error('phone')<p class="text-red-500 text-sm font-bold mt-2">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Email (Tuỳ chọn)</label>
                        <input type="email" name="email" id="email" class="block w-full rounded-2xl border-gray-200 bg-gray-50 shadow-sm focus:border-brand-500 focus:ring-brand-500 py-4 px-5 text-gray-900 font-medium transition-colors" placeholder="Nhập email">
                        @error('email')<p class="text-red-500 text-sm font-bold mt-2">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Nội dung *</label>
                        <textarea name="message" id="message" rows="4" required class="block w-full rounded-2xl border-gray-200 bg-gray-50 shadow-sm focus:border-brand-500 focus:ring-brand-500 py-4 px-5 text-gray-900 font-medium transition-colors resize-none" placeholder="Bạn cần tư vấn dòng máy nào?"></textarea>
                        @error('message')<p class="text-red-500 text-sm font-bold mt-2">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="w-full flex justify-center items-center py-4 px-8 border border-transparent rounded-2xl shadow-xl shadow-brand-500/30 text-lg font-black text-white bg-brand-600 hover:bg-brand-700 transition-all transform hover:-translate-y-1">
                        Gửi Yêu Cầu
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>
            </div>

            <!-- Info -->
            <div class="flex flex-col justify-center space-y-10 group">
                <div class="bg-gray-900 rounded-3xl p-8 sm:p-12 text-white shadow-2xl relative overflow-hidden transform transition-transform duration-500 hover:-translate-y-2">
                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-brand-500 rounded-full blur-3xl opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                    <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-brand-600 rounded-full blur-3xl opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                    
                    <h3 class="text-3xl font-black mb-10 relative z-10 tracking-tight">Thông tin liên hệ</h3>
                    
                    <dl class="space-y-10 relative z-10">
                        <div class="flex items-start">
                            <dt class="mt-1 bg-white/10 p-3 rounded-2xl backdrop-blur-sm border border-white/10">
                                <svg class="h-8 w-8 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </dt>
                            <dd class="ml-6 text-lg text-gray-300">
                                <span class="block font-black text-white mb-2 uppercase tracking-wider text-sm">Trụ sở chính</span>
                                Tòa nhà XD,<br>
                                Thuận Vinh, Đồng Sơn, Quảng Trị    
                            </dd>
                        </div>
                        
                        <div class="flex items-start">
                            <dt class="mt-1 bg-white/10 p-3 rounded-2xl backdrop-blur-sm border border-white/10">
                                <svg class="h-8 w-8 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </dt>
                            <dd class="ml-6 text-lg text-gray-300">
                                <span class="block font-black text-white mb-2 uppercase tracking-wider text-sm">Hotline tư vấn</span>
                                <a href="tel:0988xxxxxx" class="hover:text-brand-400 font-bold transition-colors">0988.xxx.xxx</a>
                            </dd>
                        </div>
                        
                        <div class="flex items-start">
                            <dt class="mt-1 bg-white/10 p-3 rounded-2xl backdrop-blur-sm border border-white/10">
                                <svg class="h-8 w-8 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </dt>
                            <dd class="ml-6 text-lg text-gray-300">
                                <span class="block font-black text-white mb-2 uppercase tracking-wider text-sm">Email</span>
                                <a href="mailto:contact@tamphucgroup.vn" class="hover:text-brand-400 font-bold transition-colors">contact@tamphucgroup.vn</a>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
