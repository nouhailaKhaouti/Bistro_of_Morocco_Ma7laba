<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
         if(Auth::User()->role==0)
         {
          $userid=Auth::user()->id;
          $profile=User::find($userid);
          $users=User::all();
          $products=Product::all()->where('user_id',$userid);
          return view('admin.home', compact('profile','products','users'));
         }
         else
         {
             return view('home');
         }
      }
      else
      {
          return redirect()->back();
      }
        
    }
    public function User_role($id){
         
        $user=User::find($id);
        if($user->role==true){
            $user->role=2;
        }else{
            $user->role=1;
        }
        $user->save();
        return redirect()->back();
    }
}
