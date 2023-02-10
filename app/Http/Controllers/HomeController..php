<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
           if(Auth::User()->usertype=='0')
           {
            $userid=Auth::user()->id;
            $profile=User::find($userid);
            $users=User::all();
            $products=Product::all()->where('user_id',$userid);
            return view('user.home', compact('profile','products','users'));
           }
           else
           {
               return view('admin.home');
           }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function index()
    {    
      //if condition here is to stop redirection to home page when the admin is loged in
      if(Auth::id())
      {
        return redirect('home');
      }
      else
      {
        $post_ad=Product::all();
        return view('user.home',compact('post_ad'));
      }
        
    }
    public function User_role($id){
         
        $user=User::find($id);
        $user->role=0;
        $user->save();
        return view('user.home');
    }
}
