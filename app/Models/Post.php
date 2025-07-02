<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'category_id', 'featured_image', 'user_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}