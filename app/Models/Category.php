<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public static function boot() {
        parent::boot();
        static::creating(function($category) {
            $category->slug = Str::slug($category->name);
            // Check if the slug is already exists for any post
            $slugCount = Category::where('slug', $category->slug)->count();
            if($slugCount > 0) {
                $category->slug .= '-'.($slugCount + 1); //Append a number to make it unique 
            }
        });
    }
}
