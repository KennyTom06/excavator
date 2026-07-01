# Thế Giới Máy Xây Dựng (Excavator Showcase)

Dự án Landing Page chuyên nghiệp giới thiệu các dòng máy xúc, máy ủi, thiết bị xây dựng.

## Tính Năng Nổi Bật

- **Giao Diện Đẹp Mắt & Chuyên Nghiệp:** Sử dụng Tailwind CSS với các hiệu ứng glassmorphism, animations hiện đại, mang lại trải nghiệm premium.
- **Trải Nghiệm Tối Ưu (Pure UI):** Thiết kế thuần túy tập trung vào việc hiển thị sản phẩm chi tiết mà không có chức năng đăng nhập, đăng ký hay giỏ hàng cho Client, tạo sự tập trung tối đa vào sản phẩm.
- **Quản Trị Linh Hoạt:** Toàn bộ thông tin sản phẩm, logo, banner được điều chỉnh dễ dàng thông qua hệ thống Admin (Filament).
- **Kiến Trúc Clean Code:** Áp dụng mô hình chuẩn `Controller -> Handler -> Repository`. Giúp tách biệt logic truy xuất cơ sở dữ liệu, xử lý nghiệp vụ và điều hướng HTTP, dễ dàng mở rộng và bảo trì.

## Yêu Cầu Hệ Thống

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL / PostgreSQL

## Cài Đặt

1. Sao chép `.env.example` thành `.env` và cấu hình Database.
2. Chạy `composer install`
3. Chạy `npm install && npm run build`
4. Sinh key: `php artisan key:generate`
5. Migrate database: `php artisan migrate`

## Kiến Trúc Mã Nguồn

Dự án sử dụng kiến trúc chuẩn giúp tối ưu hóa luồng code:
- `app/Repositories`: Xử lý giao tiếp trực tiếp với Database.
- `app/Handlers`: Xử lý logic nghiệp vụ, gọi qua Repositories.
- `app/Http/Controllers`: Gọi Handlers và trả về View (chỉ tập trung vào HTTP Request).

## Liên Hệ
Mọi chi tiết xin vui lòng liên hệ ban quản trị.
