<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'title', 'slug', 'category_id', 'user_id', 'description', 'price', 'stock', 'discount'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/products/' . $value),
        );
    }
}
