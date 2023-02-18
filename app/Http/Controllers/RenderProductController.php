<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class RenderProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('render.index',compact('products'));
    }



    public function Show(Request $request)
    {
        $pro = Product::findOrFail($request->id);
        $rederHtml = view('render.show',compact('pro'))->render();

        return response()->json([$rederHtml]);

    }




}
