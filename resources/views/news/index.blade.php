@extends('layouts.main')

@section('title', 'Tin Tức & Sự Kiện - Thế Giới Máy Xây Dựng')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Tin Tức & Sự Kiện</h1>
            <p class="mt-4 text-lg text-gray-500">Cập nhật những thông tin mới nhất về thị trường máy móc, các dự án thi công và cẩm nang kỹ thuật.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col">
                    <div class="w-full h-48 bg-gray-200 overflow-hidden">
                        @if($post->image)
                            <img src="/storage/{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" /></svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <p class="text-xs font-semibold text-brand-600 mb-2">{{ $post->created_at->format('d/m/Y') }}</p>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('news.show', $post->slug) }}" class="hover:text-brand-600 transition-colors">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="text-gray-500 line-clamp-3 mb-4 flex-grow">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                        <a href="{{ route('news.show', $post->slug) }}" class="text-brand-600 font-bold text-sm flex items-center group mt-auto">
                            Đọc tiếp 
                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20 bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900">Chưa có bài viết nào</h3>
                    <p class="mt-1 text-gray-500">Đăng nhập Admin để thêm các bản tin mới nhất.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
