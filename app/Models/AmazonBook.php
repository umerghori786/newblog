<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmazonBook extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title','filename','image_url','author_name','slogan','description','is_amazon_account','amazon_email','amazon_password'];
}
