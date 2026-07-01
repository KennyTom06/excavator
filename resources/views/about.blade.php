@extends('layouts.main')

@section('title', 'Về Chúng Tôi - Thế Giới Máy Xây Dựng')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24 min-h-screen relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-brand-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-brand-600 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="lg:text-center mb-16">
            <span class="inline-block py-1.5 px-4 rounded-full bg-brand-50 text-brand-700 text-xs font-black tracking-widest uppercase mb-4 border border-brand-100 shadow-sm">Tâm Phúc Group</span>
            <h2 class="text-4xl leading-tight font-black tracking-tight text-gray-900 sm:text-5xl lg:text-6xl mb-6">
                Đối Tác Tin Cậy<br/><span class="text-brand-600">Của Mọi Công Trình</span>
            </h2>
            <p class="max-w-3xl text-xl text-gray-600 lg:mx-auto leading-relaxed">
                Khởi nguồn từ một xưởng dịch vụ nhỏ, Tâm Phúc Group nay đã trở thành một trong những đơn vị hàng đầu Việt Nam trong lĩnh vực cung cấp thiết bị và máy móc xây dựng hạng nặng.
            </p>
        </div>

        <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8 sm:p-12 mt-16 flex flex-col lg:flex-row gap-12 items-center relative overflow-hidden">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-brand-50 rounded-full blur-3xl opacity-50 pointer-events-none"></div>
            
            <div class="w-full lg:w-1/2 relative z-10 group">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Về chúng tôi" class="w-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-in-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
            </div>
            
            <div class="w-full lg:w-1/2 space-y-8 relative z-10">
                <div>
                    <h3 class="text-3xl font-black text-gray-900 mb-4 tracking-tight">Sứ mệnh của chúng tôi</h3>
                    <p class="text-gray-600 leading-relaxed text-lg">
                        Chúng tôi cam kết cung cấp những cỗ máy chất lượng cao nhất, tối ưu hiệu suất làm việc và tiết kiệm nhiên liệu. Sự thành công của các dự án xây dựng, giao thông, thủy lợi của khách hàng chính là thước đo cho sự thành công của chúng tôi.
                    </p>
                </div>
                
                <div class="grid grid-cols-2 gap-6 pt-4">
                    <div class="bg-gray-50/80 p-6 rounded-2xl border border-gray-100 hover:border-brand-300 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <h4 class="font-black text-4xl text-brand-600 mb-1">10+</h4>
                        <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Năm kinh nghiệm</p>
                    </div>
                    <div class="bg-gray-50/80 p-6 rounded-2xl border border-gray-100 hover:border-brand-300 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <h4 class="font-black text-4xl text-brand-600 mb-1">500+</h4>
                        <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Khách hàng</p>
                    </div>
                    <div class="bg-gray-50/80 p-6 rounded-2xl border border-gray-100 hover:border-brand-300 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <h4 class="font-black text-4xl text-brand-600 mb-1">1k+</h4>
                        <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Thiết bị bán ra</p>
                    </div>
                    <div class="bg-gray-50/80 p-6 rounded-2xl border border-gray-100 hover:border-brand-300 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <h4 class="font-black text-4xl text-brand-600 mb-1">24/7</h4>
                        <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Hỗ trợ kỹ thuật</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
