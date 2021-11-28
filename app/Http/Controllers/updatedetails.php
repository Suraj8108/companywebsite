<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\GlobalSettings;

class updatedetails extends Controller
{
    //
    function landing(){
        if(Auth::check()){
            $user = Auth::user();
            $basics = GlobalSettings::all();
            
            return view('updatebasic',['user'=>$user, 'basics'=>$basics]);
        }
        else{
            return redirect('/')->withErrors(['err_msg'=> 'Please do a login first']);
        }
    }

    function updateuser(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|unique:Users,id,'.Auth::id().'|max:50|email',
        ]);
        try{   
            $user = Auth::user();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->save();
            return  redirect('/updatesdetails')->withErrors(['succ_msg'=>"Successfully updated user details :)"]);
        }
        catch(\Exception $e){
            return redirect('/updatesdetails')->withErrors(['err_msg_delete'=>"Failed to update a user details :("]);
        }
    }

    function updatebasic(Request $request){
        $validated = $request->validate([
            'cgst_rate' => 'required|numeric|min:0|max:100',
            'sgst_rate' => 'required|numeric|min:0|max:100',
            'igst_rate' => 'required|numeric|min:0|max:100'
        ]);
        try{   
            GlobalSettings::where('name','cgst_rate')->update(['value'=>$request['cgst_rate']]);
            GlobalSettings::where('name','sgst_rate')->update(['value'=>$request['sgst_rate']]);
            GlobalSettings::where('name','igst_rate')->update(['value'=>$request['igst_rate']]);
            //GlobalSettings::
            return  redirect('/updatesdetails')->withErrors(['basic_succ_msg'=>"Successfully updated basic details :)"]);
        }
        catch(\Exception $e){
            return redirect('/updatesdetails')->withErrors(['basic_err_msg_delete'=>"Failed to update a basic details :("]);
        }
    }
}
