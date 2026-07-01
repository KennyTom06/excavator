@extends('layouts.main')

@section('title', $post->title . ' - Thế Giới Máy Xây Dựng')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="hover:text-brand-600">Trang chủ</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('news.index') }}" class="hover:text-brand-600">Tin tức</a>
                    </div>
                </li>
            </ol>
        </nav>

        <article class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-12">
            @if($post->image)
                <div class="w-full h-64 md:h-96 bg-gray-200 overflow-hidden">
                    <img src="/storage/{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                </div>
            @endif
            
            <div class="p-8 md:p-12">
                <p class="text-sm font-semibold text-brand-600 mb-3 flex items-center">
                    <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    {{ $post->created_at->format('d/m/Y') }}
                </p>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-8 leading-tight">{{ $post->title }}</h1>
                
                <div class="prose prose-lg prose-brand max-w-none text-gray-700">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>
        </article>

        <!-- Related Posts -->
        @if($relatedPosts->count() > 0)
        <div>
            <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight mb-8">Tin Tức Khác</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPosts as $related)
                    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-full h-40 bg-gray-200">
                            @if($related->image)
                                <img src="/storage/{{ $related->image }}" alt="{{ $related->title }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="p-5">
                            <p class="text-xs font-semibold text-brand-600 mb-1">{{ $related->created_at->format('d/m/Y') }}</p>
                            <h3 class="text-base font-bold text-gray-900 line-clamp-2 mb-2">
                                <a href="{{ route('news.show', $related->slug) }}" class="hover:text-brand-600">{{ $related->title }}</a>
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
