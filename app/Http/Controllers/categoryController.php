<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function category()
    {
      $categorys = Category::all();
      return view('admin.category', compact('categorys'));
    }
    public function category_create(Request $request)
    {
      $category = new category;
      $category->label = $request->label;
      $category->save();
      return redirect()->back()->with('message', 'category created successfuly');
    }
    public function category_update(Request $request, $id)
    {
      $category = category::find($id);
      $category->label = $request->label;
      $category->save();
      return redirect()->back()->with('message', 'category updated successfuly');
    }
    public function category_delete($id)
    {
      $data=category::find($id);
      $data->delete();
      return redirect()->back()->with('message', 'category deleted successfuly');
    }
}
