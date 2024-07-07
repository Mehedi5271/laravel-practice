<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products',compact('products'));
    }

    public function create(){
        return view('create');
    }

    public function store( Request $request){
        $imageName = time().'.'.$request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        $product = Product::create([
            'title'=> $request->title,
            'price'=> $request->price,
            'description'=> $request->price,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'image'=> $imageName,


        ]);
        return redirect()->route('product.index')->withStatus('Data Insert Sucessfully');

    }
}
