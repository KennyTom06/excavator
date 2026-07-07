<div align="center">
  <h1>🚜 Thế Giới Máy Xây Dựng (Excavator E-Commerce Platform)</h1>
  <p>Hệ thống E-commerce toàn diện & Landing Page chuyên nghiệp dành cho lĩnh vực kinh doanh máy xúc, máy ủi và thiết bị xây dựng.</p>
</div>
Sua o nhanh main
---

## 🌟 Giới Thiệu
Dự án được xây dựng với mục tiêu cung cấp một nền tảng thương mại điện tử chuyên nghiệp, giao diện đẳng cấp và mang lại trải nghiệm người dùng tối ưu (UI/UX). Hệ thống bao gồm nền tảng Web App và cung cấp RESTful API hoàn chỉnh phục vụ cho Mobile App (Flutter).

## 🚀 Tính Năng Nổi Bật

- **Giao Diện Đẳng Cấp & Chuyên Nghiệp (Premium UI/UX):** Ứng dụng Tailwind CSS kết hợp hiệu ứng glassmorphism, animations hiện đại, thiết kế theo tone màu Navy & Gold sang trọng, chuyên nghiệp.
- **Hệ Thống E-commerce Hoàn Chỉnh:** 
  - Hỗ trợ Giỏ hàng (Shopping Cart), Quản lý Đơn hàng (Orders).
  - Xác thực người dùng (Login, Register, Profile).
  - Bộ lọc sản phẩm linh hoạt và tìm kiếm thông minh.
- **RESTful API Mạnh Mẽ (Mobile Ready):** Cung cấp hệ thống API đồng bộ bảo mật bằng Laravel Sanctum, phục vụ hoàn hảo cho Ứng dụng Mobile.
- **Quản Trị Linh Hoạt (Filament Admin):** Bảng điều khiển quản trị mạnh mẽ, trực quan, dễ dàng quản lý Đơn hàng, Sản phẩm, Danh mục, Tin tức và Giao diện hệ thống.
- **Kiến Trúc Clean Code:** Áp dụng chuẩn mô hình `Controller -> Handler -> Repository`. Tách biệt rõ ràng logic nghiệp vụ, xử lý truy xuất dữ liệu, giúp hệ thống dễ dàng mở rộng và bảo trì.

## 💻 Yêu Cầu Hệ Thống

- PHP >= 8.2
- Composer
- Node.js & NPM
- Cơ sở dữ liệu: MySQL / PostgreSQL

## 🛠 Hướng Dẫn Cài Đặt

1. **Clone dự án & cấu hình môi trường:**
   ```bash
   cp .env.example .env
   # Hãy cập nhật các thông tin cấu hình Database trong file .env
   ```

2. **Cài đặt các thư viện (Dependencies):**
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Thiết lập Database & Application:**
   ```bash
   php artisan key:generate
   php artisan migrate --seed # (Nếu có seed data)
   ```

4. **Khởi chạy ứng dụng:**
   ```bash
   php artisan serve
   ```

## 🏗 Kiến Trúc Mã Nguồn

Dự án tuân thủ nghiêm ngặt chuẩn kiến trúc phần mềm giúp tối ưu hoá vòng đời của một Request:
- `app/Repositories`: Trực tiếp xử lý các giao tiếp và truy vấn Database.
- `app/Handlers`: Đảm nhận xử lý các logic nghiệp vụ phức tạp, tương tác thông qua Repositories.
- `app/Http/Controllers`: Tiếp nhận HTTP Request, gọi đến Handlers tương ứng và trả về View / JSON Response (Tách biệt hoàn toàn khỏi logic DB).

## 📞 Liên Hệ

Mọi chi tiết về dự án, báo lỗi (issues) hoặc yêu cầu tính năng (feature requests), xin vui lòng liên hệ Ban quản trị hoặc mở Issue trên Repository.

---
*Phát triển bởi đội ngũ The Gioi Toan Cau.*
