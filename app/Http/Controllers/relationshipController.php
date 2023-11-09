<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class relationshipController extends Controller
{
    public function oneToOne()
    {
        $posts = Post::with(['images','comments'])->get();
        
        return view('onetoone',compact('posts'));
    }
}
