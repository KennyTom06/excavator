@extends('layouts.main')

@section('title', $post->title . ' - Thế Giới Máy Xây Dựng')

@section('content')
<div class="bg-gray-50 py-12 sm:py-16 min-h-screen relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-brand-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Breadcrumb -->
        <nav class="flex text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 bg-white/50 backdrop-blur px-4 py-2 rounded-2xl border border-gray-100 shadow-sm">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="hover:text-brand-600 font-medium transition-colors">Trang chủ</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('news.index') }}" class="hover:text-brand-600 font-medium transition-colors">Tin tức</a>
                    </div>
                </li>
            </ol>
        </nav>

        <article class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden mb-16 relative">
            @if($post->image)
                <div class="w-full h-64 md:h-[28rem] bg-gray-200 overflow-hidden relative">
                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-8 left-8 right-8">
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black bg-brand-600 text-white uppercase tracking-wider mb-4 shadow-lg shadow-brand-500/30">
                            Tin Tức
                        </span>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-white tracking-tight leading-tight drop-shadow-md">{{ $post->title }}</h1>
                    </div>
                </div>
            @else
                <div class="pt-12 px-8 md:px-12 pb-4">
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black bg-brand-100 text-brand-700 uppercase tracking-wider mb-4 border border-brand-200">
                        Tin Tức
                    </span>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-gray-900 tracking-tight leading-tight">{{ $post->title }}</h1>
                </div>
            @endif
            
            <div class="p-8 md:p-12 relative z-10">
                <div class="flex items-center text-sm font-bold text-gray-500 mb-10 pb-6 border-b border-gray-100">
                    <div class="flex items-center bg-gray-50 px-4 py-2 rounded-xl">
                        <svg class="w-5 h-5 mr-2 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        Đăng ngày: {{ $post->created_at->format('d/m/Y') }}
                    </div>
                </div>
                
                <div class="prose prose-lg prose-brand max-w-none text-gray-700 leading-relaxed prose-headings:font-black prose-a:text-brand-600">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>
        </article>

        <!-- Related Posts -->
        @if($relatedPosts->count() > 0)
        <div>
            <div class="flex items-center mb-8">
                <h2 class="text-3xl font-black text-gray-900 tracking-tight">Bài Viết Cùng Chuyên Mục</h2>
                <div class="h-1 flex-1 bg-gray-200 ml-6 rounded-full opacity-50"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPosts as $related)
                    <div class="group bg-white rounded-3xl border border-gray-100 overflow-hidden shadow-lg shadow-gray-200/30 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-full h-48 bg-gray-200 overflow-hidden relative">
                            @if($related->image)
                                <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        <div class="p-6">
                            <p class="text-xs font-bold text-brand-600 mb-2 flex items-center">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $related->created_at->format('d/m/Y') }}
                            </p>
                            <h3 class="text-lg font-bold text-gray-900 line-clamp-2 leading-snug group-hover:text-brand-600 transition-colors">
                                <a href="{{ route('news.show', $related->slug) }}">
                                    <span class="absolute inset-0"></span>
                                    {{ $related->title }}
                                </a>
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
