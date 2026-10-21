<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'blog_id',
        'product_id',
        'meta_tag',
    ];


    public function page(){
        return $this->belongsTo(Page::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
