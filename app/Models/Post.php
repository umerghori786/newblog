<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }
    public function scopeCheck($query){
        $query->where('status',1)->where('user_id',auth()->user()->id);
    }
}



