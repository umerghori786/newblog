<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Comment;
Use App\Models\Tag;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => 'string',
    ];


    public function getNameAttribute($value){

        return ucfirst($value);
        
    }

    public function getTextAttribute(){
        return "{$this->name} {$this->description}";
    }

    /*public function setNameAttribute($value){

        $this->attributes['Name'] = $value;
        $this->attributes['slug'] = Str::snake($value);
    }*/

    protected $fillable = ['name','slug','description','price'];

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }
    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
}
