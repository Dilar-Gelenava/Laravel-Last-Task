<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_url'
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
