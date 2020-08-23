<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'content', 'featured_image', 'category_id', 'slug',
    ];
    // public function getFeatured_imageAttribute($featured_image){
    //     return asset($featured_image);
    // }
    protected static function boot() {
        parent::boot();
    
        static::creating(function ($question) {
            $question->slug = Str::slug($question->title);
        });
    }
    protected $dates = ['deleted_at'];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}