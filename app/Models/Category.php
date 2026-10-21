<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    public function breadcrumbs()
    {
        $breadcrumbs = collect();
        $category = $this;

        while ($category) {
            $breadcrumbs->prepend($category); // add to beginning
            $category = $category->parent;
        }

        return $breadcrumbs;
    }



    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Recursive relationship to eager load all nested subcategories indefinitely
    public function allSubcategories()
    {
        return $this->subcategories()->with('allSubcategories');
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
