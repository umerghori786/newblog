<?php

namespace App\Http\Controllers;
use App\Models\jquery;
use App\Models\Post;
use App\Models\Image;

use Illuminate\Http\Request;

class JqueryController extends Controller
{
    public function index(){
        return view('jquery');
    }
    public function store(Request $request){
        $quantity = $request->quantity;
        foreach ($quantity as $key => $value) {
           jquery::create(['quantity'=>$value, 'price'=>$request->price[$key], 'total'=>$request->total[$key], 'g-total'=>$request->g_total]); 
        }

        return back();
    }

    public function image_jquery(){
        return view('image_jquery');
    }
    public function image_store(Request $request){


        $post = Post::create(['title'=>$request->title]);
        if($request->has('image')){

        foreach ($request->image as $key => $img) {

            $imageName = time().'.'.$img->getClientOriginalName();
            $img->move(public_path('test/uploads'), $imageName);
            $student_image_url = url('test/uploads/'.$imageName);
            $post->images()->create(['url'=>$student_image_url]);

        }

        }
        return redirect()->back();
    }

    public function image_index(){
        $posts = Post::all();

        return view('image.index',compact('posts'));
    }

    public function image_edit($id){
        $post = Post::with('images')->find($id);
        return view('image.edit',compact('post'));
    }

    public function render(){

        $post = Post::with('images')->first();
        
         dd(view('image.edit',compact('post'))->render());
    }
}
