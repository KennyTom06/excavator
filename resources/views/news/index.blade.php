@extends('layouts.main')

@section('title', 'Tin Tức & Sự Kiện - Thế Giới Máy Xây Dựng')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24 relative overflow-hidden min-h-screen">
    <div class="absolute top-0 right-0 w-96 h-96 bg-brand-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-brand-600 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block py-1.5 px-4 rounded-full bg-brand-50 text-brand-700 text-xs font-black tracking-widest uppercase mb-4 border border-brand-100 shadow-sm">Tin Tức & Sự Kiện</span>
            <h1 class="text-4xl font-black text-gray-900 sm:text-5xl lg:text-6xl tracking-tight mb-6">Cập Nhật <span class="text-brand-600">Mới Nhất</span></h1>
            <p class="mt-4 text-xl text-gray-600 leading-relaxed">Cập nhật những thông tin mới nhất về thị trường máy móc, các dự án thi công và cẩm nang kỹ thuật.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <div class="group bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 flex flex-col relative">
                    <div class="w-full h-56 bg-gray-200 overflow-hidden relative">
                        @if($post->image)
                            <img src="/storage/{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100 group-hover:scale-110 transition-transform duration-700">
                                <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" /></svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1.5 rounded-full text-xs font-black text-brand-600 shadow-sm flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $post->created_at->format('d/m/Y') }}
                        </div>
                    </div>
                    <div class="p-8 flex-grow flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 line-clamp-2 leading-snug group-hover:text-brand-600 transition-colors">
                            <a href="{{ route('news.show', $post->slug) }}">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="text-gray-600 line-clamp-3 mb-6 flex-grow leading-relaxed">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                        <div class="mt-auto pt-4 border-t border-gray-100">
                            <span class="inline-flex items-center text-brand-600 font-bold text-base group/btn">
                                Đọc tiếp 
                                <span class="w-8 h-8 rounded-full bg-brand-50 flex items-center justify-center ml-2 group-hover/btn:bg-brand-600 group-hover/btn:text-white transition-colors">
                                    <svg class="w-4 h-4 transform group-hover/btn:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-24 bg-white/80 backdrop-blur rounded-3xl border border-gray-100 shadow-xl shadow-gray-200/50">
                    <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Chưa có bài viết nào</h3>
                    <p class="text-gray-500 font-medium mb-8">Đăng nhập Admin để thêm các bản tin mới nhất.</p>
                    <a href="/admin" class="inline-flex items-center px-8 py-4 border border-transparent shadow-lg text-base font-bold rounded-2xl text-white bg-gray-900 hover:bg-gray-800 transition-all transform hover:-translate-y-1">
                        Tới trang Admin
                    </a>
                </div>
            @endforelse
        </div>

        @if($posts->hasPages())
        <div class="mt-16 bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex justify-center">
            {{ $posts->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
