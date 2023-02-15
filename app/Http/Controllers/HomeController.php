<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
           if(Auth::User()->role==1)
           {
            $userid=Auth::user()->id;
            $profile=User::find($userid);
            $products=Product::all();
            return view('user.home', compact('profile','products'));
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
         {  $userid=Auth::user()->id;
            $profile=User::find($userid);
            $products=Product::all();
            return view('user.home', compact('profile','products'));

         }
      }
      else
      {
          return redirect()->back();
      }
        
    }
    public function change_role($id){
        $user=User::find($id);
        if($user->role==true){
            $user->role=2;
        }else if($user->role==2){
            $user->role=1;
        }
        $user->save();
        return redirect()->back();
        // echo 'gholam parait';
    }

    public function Profile(){
        $user = user::find(Auth::user()->id);
      return view('user.profile', compact('user'));
    }

    public function Delete(){
        $user = user::find(Auth::user()->id);
        $user->delete();
        return view('home');
    }

    public function editprofile(Request $request)
    {
      $profile = User::find(Auth::user()->id);
      $image = $request->image;
      if ($image) {
        //we create a new name for the image 
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        //and after we move it to an other file called doctorimage that will be created automaticly ones we upload the image 
        $request->image->move('Profileimage', $imagename);
        $profile->image = $imagename;
      }
      $profile->name = $request->name;
      $profile->email = $request->email;
      $profile->save();
      return redirect()->back()->with('message', 'profile updated successfuly');
    }
    public function UpdatePassword(Request $request){

        $request->validate([
            'old_password'=>'required|min:6|max:50',
            'new_password'=>'required|min:6|max:50',
            'confirm_password'=>'required|same:new_password'
        ]);

        $current_user=auth()->user();
   
        if(Hash::check($request->old_password,$current_user->password)){
            $current_user->update([
              'password'=>bcrypt($request->new_password)
            ]);
            return redirect()->back()->with('success','Updated successfully');
        }else{
            return redirect()->back()->with('error','Old password does not matched.');
        }

    } 
    public function logout()
{
    Auth::logout();
    return redirect('/login');
}
}
