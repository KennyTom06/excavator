<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'model',
        'weight',
        'lifting_capacity',
        'bucket_capacity',
        'max_dump_height',
        'engine_model',
        'engine_power',
        'transmission_type',
        'tire_size',
        'overall_dimensions',
        'work_cycle',
        'max_speed',
        'gradeability',
        'image',
        'description',
        'is_active',
        'price',
        'quantity',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
