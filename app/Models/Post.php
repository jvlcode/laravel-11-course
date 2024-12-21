<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    //
    protected $fillable = ['title', 'content', 'img_url'];

    public static function boot() {
        parent::boot();
        static::creating(function($post) {
            $post->slug = Str::slug($post->title);
            // Check if the slug is already exists for any post
            $slugCount = Post::where('slug', $post->slug)->count();
            if($slugCount > 0) {
                $post->slug .= '-'.($slugCount + 1); //Append a number to make it unique 
            }
        });
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
}
