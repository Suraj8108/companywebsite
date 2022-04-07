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

    public function generatedoc(Request $request){
        //dd($request->all());
        $my_template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('format.docx'));
        
        $my_template->setValue("bill_name", $request['bill_name']);
        $my_template->setValue("bill_gst", $request['bill_gst']);
        $my_template->setValue("bill_add", $request['bill_add']);
        
        $my_template->setValue("invoice", $request['invoice']);
        $my_template->setValue("inDate", $request['inDate']);
        
        $my_template->setValue("challan", $request['challan']);
        $my_template->setValue("chDate", $request['chDate']);

        $my_template->setValue("DispatchBy", $request['DispatchBy']);

        $request['Sno1'] = ($request["Rs1"] == 0 or $request["Rs1"] == null)? null:$request['Sno1'];
        $my_template->setValue("1", $request['Sno1']);
        $my_template->setValue("pa1", $request['particular1']);
        $my_template->setValue("h1", $request['hsn1']);
        $my_template->setValue("pi1", $request['pieces1']);
        $my_template->setValue("ra1", $request['rate1']);
        $my_template->setValue("rs1", $request['Rs1']);
        $my_template->setValue("p1", $request['Ps1']);

        $request['Sno2'] = ($request["Rs2"] == 0 or $request["Rs2"] == null)? null:$request['Sno2'];
        $my_template->setValue("2", $request['Sno2']);
        $my_template->setValue("pa2", $request['particular2']);
        $my_template->setValue("h2", $request['hsn2']);
        $my_template->setValue("pi2", $request['pieces2']);
        $my_template->setValue("ra2", $request['rate2']);
        $my_template->setValue("rs2", $request['Rs2']);
        $my_template->setValue("p2", $request['Ps2']);

        $request['Sno3'] = ($request["Rs3"] == 0 or $request["Rs3"] == null)? null:$request['Sno3'];
        $my_template->setValue("3", $request['Sno3']);
        $my_template->setValue("pa3", $request['particular3']);
        $my_template->setValue("h3", $request['hsn3']);
        $my_template->setValue("pi3", $request['pieces3']);
        $my_template->setValue("ra3", $request['rate3']);
        $my_template->setValue("rs3", $request['Rs3']);
        $my_template->setValue("p3", $request['Ps3']);

        $request['Sno4'] = ($request["Rs4"] == 0 or $request["Rs4"] == null)? null:$request['Sno4'];
        $my_template->setValue("4", $request['Sno4']);
        $my_template->setValue("pa4", $request['particular4']);
        $my_template->setValue("h4", $request['hsn4']);
        $my_template->setValue("pi4", $request['pieces4']);
        $my_template->setValue("ra4", $request['rate4']);
        $my_template->setValue("rs4", $request['Rs4']);
        $my_template->setValue("p4", $request['Ps4']);

        $request['Sno5'] = ($request["Rs5"] == 0 or $request["Rs5"] == null)? null:$request['Sno5'];
        $my_template->setValue("5", $request['Sno5']);
        $my_template->setValue("pa5", $request['particular5']);
        $my_template->setValue("h5", $request['hsn5']);
        $my_template->setValue("pi5", $request['pieces5']);
        $my_template->setValue("ra5", $request['rate5']);
        $my_template->setValue("rs5", $request['Rs5']);
        $my_template->setValue("p5", $request['Ps5']);

        $my_template->setValue("tval", $request['total_val']);
        $my_template->setValue("cr", $request['cgst_rate']);
        $my_template->setValue("cgst", $request['cgst']);
        $my_template->setValue("sr", $request['sgst_rate']);
        $my_template->setValue("sgst", $request['sgst']);

        $my_template->setValue("fval", $request['finalVal']);
        $my_template->setValue("txval", $request['taxval']);

        $request['bank_name'] = strtoupper($request['bank_name']);
        $my_template->setValue("bname", $request['bank_name']);

        $request['acc_name'] = strtoupper($request['acc_name']);
        $my_template->setValue("aname", $request['acc_name']);
        $my_template->setValue("anum", $request['acc_num']);

        $request['ifsc_code'] = strtoupper($request['ifsc_code']);
        $my_template->setValue("ifsc", $request['ifsc_code']);

        try{
            //$my_template->saveAs('user_1.docx');
            $my_template->saveAs('user1.docx');
        }catch (Exception $e){
            //handle exception
            dd("Please Close");
        }
        return response()->download('user1.docx')->deleteFileAfterSend(true);
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
