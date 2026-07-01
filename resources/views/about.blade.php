@extends('layouts.main')

@section('title', 'Về Chúng Tôi - Thế Giới Máy Xây Dựng')

@section('content')
<div class="bg-white py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-brand-600 font-semibold tracking-wide uppercase">Tâm Phúc Group</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Đối Tác Tin Cậy Của Mọi Công Trình
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                Khởi nguồn từ một xưởng dịch vụ nhỏ, Tâm Phúc Group nay đã trở thành một trong những đơn vị hàng đầu Việt Nam trong lĩnh vực cung cấp thiết bị và máy móc xây dựng hạng nặng.
            </p>
        </div>

        <div class="mt-16 flex flex-col lg:flex-row gap-12 items-center">
            <div class="w-full lg:w-1/2">
                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Về chúng tôi" class="rounded-2xl shadow-xl">
            </div>
            <div class="w-full lg:w-1/2 space-y-6">
                <h3 class="text-2xl font-bold text-gray-900">Sứ mệnh của chúng tôi</h3>
                <p class="text-gray-600 leading-relaxed text-lg">
                    Chúng tôi cam kết cung cấp những cỗ máy chất lượng cao nhất, tối ưu hiệu suất làm việc và tiết kiệm nhiên liệu. Sự thành công của các dự án xây dựng, giao thông, thủy lợi của khách hàng chính là thước đo cho sự thành công của chúng tôi.
                </p>
                <div class="grid grid-cols-2 gap-6 mt-8">
                    <div class="bg-brand-50 p-6 rounded-xl border border-brand-100">
                        <h4 class="font-bold text-3xl text-brand-600">10+</h4>
                        <p class="text-sm font-medium text-gray-900 mt-2">Năm kinh nghiệm</p>
                    </div>
                    <div class="bg-brand-50 p-6 rounded-xl border border-brand-100">
                        <h4 class="font-bold text-3xl text-brand-600">500+</h4>
                        <p class="text-sm font-medium text-gray-900 mt-2">Khách hàng tin tưởng</p>
                    </div>
                    <div class="bg-brand-50 p-6 rounded-xl border border-brand-100">
                        <h4 class="font-bold text-3xl text-brand-600">1000+</h4>
                        <p class="text-sm font-medium text-gray-900 mt-2">Thiết bị đã bàn giao</p>
                    </div>
                    <div class="bg-brand-50 p-6 rounded-xl border border-brand-100">
                        <h4 class="font-bold text-3xl text-brand-600">24/7</h4>
                        <p class="text-sm font-medium text-gray-900 mt-2">Hỗ trợ kỹ thuật</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
