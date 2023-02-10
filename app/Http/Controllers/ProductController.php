<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //   public function createProduc()
    public function Product()
    {
        $products=Product::all();
        return view('admin.Product',compact('products'));
    }
    public function Product_create(Request $request)
    {
        $product=new Product();
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        if(Auth::id())
        {
          $product->user_id=Auth::user()->id;
        }
        $product->save();
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('Productimages');
                // dd($path);
                Image::create([
                    'product_id' => $product->id,
                    'path' => $path
                ]);
            }
        }
        return redirect()->back()->with('message','product created successfuly');
    }
    public function Product_update(Request $request)
    { 
        $id=$request->id;
        $product=Product::find($id);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        if(Auth::id())
        {
          $product->user_id=Auth::user()->id;
        }
        $product->save();
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('Productimages');
                // dd($path);
                Image::create([
                    'product_id' => $product->id,
                    'path' => $path
                ]);
            }
        }
        return redirect()->back()->with('message','product updated successfuly');
    }
    public function destroy($id){
        Product::destroy($id);
        return redirect()->back();
    }
}


