<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Blog_category;
use Illuminate\Support\Facades\Response;

class TestFilterController extends Controller
{
    public function index(){
    	$cats = Blog_category::all();
    	$books = Tag::all();
    	return view('test.testfilter', compact('cats','books'));
    }
    public function book(request $request){
    	$filter_id = $request->input('filter_id');
    	$data = Tag::where('blogcategories_id',$filter_id)->get();
    	return Response::json($data);
    }

    public function vue(){
        return view('vue');
    }
}
