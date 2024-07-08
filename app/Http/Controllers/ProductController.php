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
            'description'=> $request->description,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'image'=> $imageName,


        ]);
        return redirect()->route('product.index')->withStatus('Data Insert Sucessfully');

    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('show',compact('product'));
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('update',compact('product'));
    }

    public function update( Request $request, $id){
        $product = Product::findOrFail($id);

        $imageName = time().'.'.$request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        $product->update([
            'title'=> $request->title,
            'price'=> $request->price,
            'description'=> $request->description,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'image'=> $imageName,


        ]);
        return redirect()->route('product.index')->withStatus('Data Update Sucessfully');
    }

    public function destroy($id){
       Product::destroy($id);
       return redirect()->route('product.index')->withStatus('Data Deleted Sucessfully');



    }
    public function trash(){

       $products = Product::latest()->onlyTrashed()->paginate();
       return view('trash',compact('products'));

     }

     public function restore($id){

        $products = Product::onlyTrashed()->find($id);
        $products->restore();
        return redirect()->route('product.trash')->withStatus('Data Restore Sucessfully');


      }

      public function delete($id){

        $products = Product::onlyTrashed()->find($id);
        $products->forceDelete();
        return redirect()->route('product.trash')->withStatus('Data Delete Sucessfully');


      }


}
