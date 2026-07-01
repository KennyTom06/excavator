<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('model')->nullable();
            $table->string('weight')->nullable(); // Trọng lượng máy
            $table->string('lifting_capacity')->nullable(); // Tải trọng nâng
            $table->string('bucket_capacity')->nullable(); // Dung tích gầu tiêu chuẩn
            $table->string('max_dump_height')->nullable(); // Chiều cao đổ tối đa
            $table->string('engine_model')->nullable(); // Model động cơ
            $table->string('engine_power')->nullable(); // Công suất động cơ
            $table->string('transmission_type')->nullable(); // Loại hộp số
            $table->string('tire_size')->nullable(); // Kích thước lốp
            $table->string('overall_dimensions')->nullable(); // Kích thước tổng thể
            $table->string('work_cycle')->nullable(); // Chu kỳ làm việc
            $table->string('max_speed')->nullable(); // Tốc độ tối đa
            $table->string('gradeability')->nullable(); // Khả năng leo dốc
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
