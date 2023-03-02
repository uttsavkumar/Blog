<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function home(Request $req){
        $data['user'] = Auth::user();
        $data['blog'] = Blog::all();
        if($req->method() == 'POST'){
            // dd("ads");
            $req->validate([
                'content' => 'required'
            ]);
            $blog = new Blog();
            if($req->file('image')){
                $file= $req->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/BlogImage'), $filename);
                $blog->image = $filename;
            }
            $blog->content = $req->content;
            $blog->user_id = Auth::id();
            $blog->save();
            return redirect()->back();
        }
        return view('frontend/home',$data);
    }   
    public function login(Request $req){
        if($req->method() == 'POST'){
            $req->validate([
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);
            $user_data = array(
                'email'  => $req->get('email'),
                'password' => $req->get('password')
               );
            if(Auth::attempt($user_data)){
                return redirect()->route('home');
            }
            else{
                return redirect()->route('login')->with('msg','Incorrect Password or Email!');

            }
        }
        return view('frontend/login');
    }
    public function signup(Request $req){
        if($req->method() == 'POST'){
            $req->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);
            $user = User::where('email',$req->email)->first();
            if($user){
                return redirect()->back()->with('msg','User Already Exists!');
            }
            else{
                $u = new User();
                $u->name =  $req->name; 
                $u->email =  $req->email; 
                $u->password =  Hash::make($req->password);
                $save = $u->save();
                if($save){
                    $user_data = array(
                        'email'  => $req->get('email'),
                        'password' => $req->get('password')
                       );
                    if(Auth::attempt($user_data)){
                        return redirect()->route('home');
                    }
                }
                else{
                    return redirect()->route('login');
                }

            }
        }
        return view('frontend/signup');
    }
    public function logout(Request $req){
        Auth::logout();
        return redirect()->route('login');
    }
    public function profile(){
        $data['user'] = Auth::user();
        return view('frontend/profile',$data);
    }
    public function password(Request $req){

        $password = $req->get('password');
        $newpassword = $req->get('newpassword');
        $renewpassword = $req->get('renewpassword');
        $req->validate([
            'newpassword' => 'required|min:6',
            'password' => 'required|min:6',
            'renewpassword' => 'required|min:6',
        ]);
        $user = User::where('id',Auth::id())->first();

        if(Hash::check($password,$user->password)){
          
            if($newpassword == $renewpassword){
                $user->password = Hash::make($newpassword);
                $user->save();
                return redirect()->route('profile');
            }
            else{
                return redirect()->back()->with('msg',"Password Doesn't Match!");
            }
        }
        else{
            return redirect()->back()->with('msg',"Incorrect Password!");
        }
    
    }


    public function editprofile(Request $req){
         $req->validate([
            'email' => 'email'
         ]);
         $user = User::where('id',Auth::id())->first();
         $user->name = $req->name;
         $user->email = $req->email;
         if($req->file('image')){
            $file= $req->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $user->image = $filename;
        }
        $user->save();
        return  redirect()->back();
    }

}
