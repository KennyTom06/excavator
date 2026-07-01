<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Order;
use App\Models\Product;
use App\Models\Contact;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    
    protected function getStats(): array
    {
        return [
            Stat::make('Tổng số Đơn hàng', Order::count())
                ->description('Tổng số đơn đặt hàng từ khách hàng')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
                
            Stat::make('Tổng số Sản phẩm', Product::count())
                ->description('Các dòng máy đang được phân phối')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary')
                ->chart([3, 5, 2, 8, 12, 10, 15]),
                
            Stat::make('Liên hệ / Phản hồi', Contact::count())
                ->description('Số lượng khách hàng gửi liên hệ')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('warning')
                ->chart([1, 4, 2, 5, 3, 8, 5]),
        ];
    }
}
