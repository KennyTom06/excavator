@extends('layouts.main')

@section('title', 'Về Chúng Tôi - Công Ty TNHH Hồ Nam')

@section('content')
<!-- Hero Section (Navy Đậm + Vàng Đồng + Contour Transition) -->
<div class="relative w-full bg-secondary text-white pt-24 pb-32 sm:pt-32 sm:pb-40 overflow-hidden">
    <!-- Contour lines background texture -->
    <div class="absolute inset-0 opacity-15 pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg width=\'100%25\' height=\'100%25\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cdefs%3E%3Cpattern id=\'topography\' width=\'150\' height=\'150\' patternUnits=\'userSpaceOnUse\'%3E%3Cpath d=\'M0,50 Q75,0 150,50 T300,50\' fill=\'none\' stroke=\'%23B08A4E\' stroke-width=\'1\'/%3E%3Cpath d=\'M0,75 Q75,25 150,75 T300,75\' fill=\'none\' stroke=\'%23B08A4E\' stroke-width=\'0.5\'/%3E%3Cpath d=\'M0,100 Q75,50 150,100 T300,100\' fill=\'none\' stroke=\'%23B08A4E\' stroke-width=\'1\'/%3E%3C/pattern%3E%3C/defs%3E%3Crect width=\'100%25\' height=\'100%25\' fill=\'url(%23topography)\'/%3E%3C/svg%3E');"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span class="inline-block py-1.5 px-5 rounded-full bg-primary/20 text-primary border border-primary/30 text-xs font-black tracking-[0.2em] uppercase mb-6 shadow-sm">
            HO NAM CO.,LTD
        </span>
        <h2 class="text-4xl sm:text-5xl lg:text-6xl mb-6 font-headline-xl text-white">
            Kiến tạo không gian xanh<br/>
            <span class="text-primary mt-2 inline-block">Đối Tác Của Mọi Công Trình</span>
        </h2>
        <p class="max-w-3xl text-lg sm:text-xl text-gray-300 mx-auto leading-relaxed">
            Thành lập vào năm 2006 trên nền tảng tiền thân là cơ sở hoa kiểng Nhật Tân (1996), Công Ty TNHH Hồ Nam tự hào là đơn vị hàng đầu trong lĩnh vực thiết kế và thi công cảnh quan kỹ thuật.
        </p>
    </div>
    
    <!-- Topographic contour transition at the bottom -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[60px] sm:h-[100px]">
            <!-- Technical contour transition lines -->
            <path d="M0,30 Q150,50 300,30 T600,40 T900,20 T1200,40 L1200,120 L0,120 Z" fill="#fbfcf8" opacity="0.3"></path>
            <path d="M0,50 Q150,70 300,50 T600,60 T900,40 T1200,60 L1200,120 L0,120 Z" fill="#fbfcf8" opacity="0.6"></path>
            <path d="M0,70 Q150,90 300,70 T600,80 T900,60 T1200,80 L1200,120 L0,120 Z" fill="#fbfcf8"></path>
            <!-- Accent contour line -->
            <path d="M0,70 Q150,90 300,70 T600,80 T900,60 T1200,80" fill="none" stroke="#B08A4E" stroke-width="2"></path>
        </svg>
    </div>
</div>

<!-- Main Content Area -->
<div class="bg-background py-16 sm:py-24 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-outline-variant/30 p-8 sm:p-12 flex flex-col lg:flex-row gap-12 items-center relative overflow-hidden">
            
            <div class="w-full lg:w-1/2 relative z-10 group">
                <div class="relative rounded-2xl overflow-hidden shadow-lg border border-primary/10">
                    <!-- Added a golden overlay filter effect on hover to match the premium theme -->
                    <img src="{{ asset('images/cay_xanh.jpeg') }}" alt="Cây xanh cảnh quan" class="w-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-in-out mix-blend-multiply">
                    <div class="absolute inset-0 bg-secondary/20 group-hover:bg-transparent transition-colors duration-500"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-secondary/80 to-transparent opacity-60"></div>
                </div>
            </div>
            
            <div class="w-full lg:w-1/2 space-y-8 relative z-10">
                <div>
                    <h3 class="text-3xl font-headline-lg text-secondary mb-4">Kinh nghiệm & Đội ngũ</h3>
                    <div class="w-16 h-1 bg-primary mb-6"></div>
                    <p class="text-on-surface-variant leading-relaxed text-lg mb-4">
                        Dưới sự dẫn dắt của <strong class="text-secondary font-semibold">Giám đốc Nguyễn Chí Chúc (Sinh năm 1966)</strong> - Kỹ sư Đại học Nông nghiệp I Hà Nội. Ông từng có kinh nghiệm công tác tại Đại học Nông nghiệp I Hà Nội, Vườn cây cảnh Ban quản lý Quảng Trường Ba Đình, và nhiều công ty, ban ngành lớn khác về lĩnh vực lâm viên, cây xanh.
                    </p>
                    <p class="text-on-surface-variant leading-relaxed text-lg">
                        Đến nay, Công ty đã thực hiện trên 30 dự án lớn nhỏ khác nhau, bao gồm các công trình cây xanh cảnh quan khu du lịch ven biển, khu công nghiệp, trụ sở công ty và công trình biệt thự cao cấp.
                    </p>
                </div>
                
                <div class="grid grid-cols-2 gap-4 sm:gap-6 pt-4">
                    <div class="bg-surface p-6 rounded-2xl border border-outline-variant/50 hover:border-primary/50 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-16 h-16 bg-primary/5 rounded-bl-full"></div>
                        <h4 class="font-numbers text-4xl sm:text-5xl text-primary mb-2">1996</h4>
                        <p class="text-xs sm:text-sm font-bold text-secondary uppercase tracking-wider">Tiền thân cơ sở</p>
                    </div>
                    <div class="bg-surface p-6 rounded-2xl border border-outline-variant/50 hover:border-primary/50 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-16 h-16 bg-primary/5 rounded-bl-full"></div>
                        <h4 class="font-numbers text-4xl sm:text-5xl text-primary mb-2">2006</h4>
                        <p class="text-xs sm:text-sm font-bold text-secondary uppercase tracking-wider">Năm thành lập</p>
                    </div>
                    <div class="bg-surface p-6 rounded-2xl border border-outline-variant/50 hover:border-primary/50 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-16 h-16 bg-primary/5 rounded-bl-full"></div>
                        <h4 class="font-numbers text-4xl sm:text-5xl text-primary mb-2">30+</h4>
                        <p class="text-xs sm:text-sm font-bold text-secondary uppercase tracking-wider">Dự án thi công</p>
                    </div>
                    <div class="bg-surface p-6 rounded-2xl border border-outline-variant/50 hover:border-primary/50 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-16 h-16 bg-primary/5 rounded-bl-full"></div>
                        <h4 class="font-numbers text-4xl sm:text-5xl text-primary mb-2">100%</h4>
                        <p class="text-xs sm:text-sm font-bold text-secondary uppercase tracking-wider">Tâm huyết</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-24">
            <div class="text-center mb-12">
                <h3 class="text-3xl sm:text-4xl font-headline-xl text-secondary mb-4">Các Dự Án Tiêu Biểu</h3>
                <div class="w-24 h-1 bg-primary mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Dự án 1 -->
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-outline-variant/30 group">
                    <div class="p-8">
                        <div class="w-14 h-14 bg-secondary/5 text-primary rounded-xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                            <span class="material-symbols-outlined text-3xl">park</span>
                        </div>
                        <h4 class="text-xl font-headline-md text-secondary mb-3">Công viên bãi trước</h4>
                        <p class="text-on-surface-variant text-sm leading-relaxed">Thi công và thiết kế cảnh quan xanh mát, mang lại không gian thư giãn cho người dân và khách du lịch.</p>
                    </div>
                </div>
                <!-- Dự án 2 -->
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-outline-variant/30 group">
                    <div class="p-8">
                        <div class="w-14 h-14 bg-secondary/5 text-primary rounded-xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                            <span class="material-symbols-outlined text-3xl">holiday_village</span>
                        </div>
                        <h4 class="text-xl font-headline-md text-secondary mb-3">Resort Six Senses</h4>
                        <p class="text-on-surface-variant text-sm leading-relaxed">Thi công cảnh quan tại Đất Dốc Côn Đảo, hòa hợp thiên nhiên với kiến trúc nghỉ dưỡng cao cấp.</p>
                    </div>
                </div>
                <!-- Dự án 3 -->
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-outline-variant/30 group">
                    <div class="p-8">
                        <div class="w-14 h-14 bg-secondary/5 text-primary rounded-xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                            <span class="material-symbols-outlined text-3xl">beach_access</span>
                        </div>
                        <h4 class="text-xl font-headline-md text-secondary mb-3">KDL Bến Thành - Long Hải</h4>
                        <p class="text-on-surface-variant text-sm leading-relaxed">Tổng thầu EPC hệ thống cây xanh cảnh quan tại khu du lịch nổi tiếng ven biển.</p>
                    </div>
                </div>
                <!-- Dự án 4 -->
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-outline-variant/30 group">
                    <div class="p-8">
                        <div class="w-14 h-14 bg-secondary/5 text-primary rounded-xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                            <span class="material-symbols-outlined text-3xl">villa</span>
                        </div>
                        <h4 class="text-xl font-headline-md text-secondary mb-3">Khu biệt thự Ocenami</h4>
                        <p class="text-on-surface-variant text-sm leading-relaxed">Thi công và chăm sóc định kỳ mảng xanh sinh thái, mang lại sức sống bền vững cho khu dân cư cao cấp.</p>
                    </div>
                </div>
                <!-- Dự án 5 -->
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-outline-variant/30 group md:col-span-2 lg:col-span-1">
                    <div class="p-8">
                        <div class="w-14 h-14 bg-secondary/5 text-primary rounded-xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                            <span class="material-symbols-outlined text-3xl">museum</span>
                        </div>
                        <h4 class="text-xl font-headline-md text-secondary mb-3">Bảo Tàng Tỉnh BR-VT</h4>
                        <p class="text-on-surface-variant text-sm leading-relaxed">Thi công mảng cây xanh cảnh quan, tạo dấu ấn thẩm mỹ và trang trọng cho không gian văn hóa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
