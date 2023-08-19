<?php

namespace App\Http\Controllers;
use App\Models\jquery;
use App\Models\Post;
use App\Models\Image;
use App\Models\JqueryTotol;
use Illuminate\Http\Request;
use App\Models\User;

class JqueryController extends Controller
{
    public function index(){
        $users = User::pluck('name','id');
        return view('jquery',compact('users'));
    }
    public function store(Request $request){
        dd($request->all());
        $gtotal = JqueryTotol::create(['grand_total'=>$request->grand_total]);
        $quantity = $request->quantity;
        foreach ($quantity as $key => $value) {
           jquery::create(['quantity'=>$value, 'price'=>$request->price[$key], 'total'=>$request->total[$key], 'grand_total_id'=>$gtotal->id]); 
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
