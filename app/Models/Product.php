<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'description',
        'slug',
        'pdf'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productImage()
    {
        return $this->hasOne(ProductImage::class);
    }

    public function productImages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function metaTags()
    {
        return $this->hasMany(MetaTag::class);
    }
}
