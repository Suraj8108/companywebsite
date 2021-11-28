<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Auth;
use App\Models\GlobalSettings;

class landing extends Controller
{
    //
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|unique:Users|max:25|email',
            'password' => 'required|min:6'
        ]);
        $name = $request['name'];
        $email = $request['email'];
        $password = Hash::make($request['password']);
        if($email && $password && $email){
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->remember_token = $request->session()->token();
            $user->email_verified = 0;
            $user->created_at = date("Y/m/d");
            $user->updated_at = date("Y/m/d"); 
            $user->save();
            return  redirect('/')->withErrors(['succ_msg'=>"Successfully Registered!!  Please Login (:"]);
        }
        return redirect('/')->withErrors(['err_msg'=>"Failed Please Login Again"]);

    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|max:25|email',
            'pass' => 'required|min:6'
        ]);
        $email = $request['email'];
        $pass = $request['pass'];
        $params = ['email'=>$email, 'password'=>$pass];
        if(Auth::attempt($params)){
            $user = User::where('email',$email)->first();
            auth()->login($user);
            return redirect('/dashboard');
        }
        else{
            return redirect('/')->withErrors(['err_msg'=>'Please Enter the valid Credentials']);
        }

    }

    public function dashboard(){
        if(Auth::check()){
            $user = Auth::user();
            $basics = GlobalSettings::all();
            foreach($basics as $val){
                $rates[$val['name']] = $val['value'];
            }
            return view('dashboard',['user'=>$user, 'rates'=>$rates]);
        }
        else{
            return redirect('/')->withErrors(['err_msg'=> 'Please do a login first']);
        }
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect('/');
        }
        else{
            return redirect('/')->withErrors(['err_msg'=> 'Please do a login first']);
        }
    }
}
