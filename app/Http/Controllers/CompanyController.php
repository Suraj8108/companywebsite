<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Company;
use App\Models\transaction;

class CompanyController extends Controller
{
    //
    function addCompany(){
        if(Auth::check()){
            $user = Auth::user();
            $companies = Company::where('user_id', Auth::id())->get();
            return view('addCompany',['user'=>$user, 'companies'=>$companies]);
        }
        else{
            return redirect('/')->withErrors(['err_msg'=> 'Please do a login first']);
        }
    }

    function postaddCompany(Request $request){
        if(Auth::check()){
            $validated = $request->validate([
                'name'    => 'required|unique:companies,comp_name,NULL,id,id,'.Auth::id().'|max:50',
                'gst'     => 'required|max:30',
                'email'   => 'nullable|max:25|email',
                'number'  => 'required|min:10',
                'address' => 'required',
            ]);
            try {
                $company = new Company();
                $company->comp_name    = $request['name'];
                $company->comp_gst     = $request['gst'];
                $company->comp_email   = $request['email'];
                $company->comp_number  = $request['number'];
                $company->comp_address = $request['address'];
                $company->user_id      = Auth::id();
                $company->save();
                
                return  redirect('/addcompany')->withErrors(['succ_msg'=>"Successfully added new Company :)"]);
            } 
            catch (\Exception $e) { 
                  return redirect('/addcompany')->withErrors(['err_msg'=>"Failed to add a Company :("]);
            }
        }
        else{
            return redirect('/')->withErrors(['err_msg'=> 'Please do a login first']);
        }
    }

    function deletecompany(Request $request){
        if(Auth::check()){
            try{
                $company = Company::find($request['comp_id']);
                $compayname = $company['comp_name'];
                $company->delete();
                return  redirect('/addcompany')->withErrors(['succ_msg_delete'=>"Successfully deleted ".$compayname." Company :)"]);
            }
            catch(\Exception $e){
                return redirect('/addcompany')->withErrors(['err_msg_delete'=>"Failed to delete a Company :("]);
            }
        }
        else{
            return redirect('/')->withErrors(['err_msg'=> 'Please do a login first']);
        }
    }

    function autocomplete(Request $request){
        $query = $request['query'];
        $res = Company::select("comp_name")
                ->where('comp_name','LIKE','%'.$query.'%')
                ->where('user_id',Auth::id())
                ->get();
        $data = array();
        foreach ($res as $val){
            $data[] = $val->comp_name;
        }
    
        return response()->json($data);
    }

    function findcompany(Request $request){
        $data = Company::where('comp_name',$request['comp_name'])->get();
        return response()->json($data);
    }

    function addtransaction(Request $request){
        $validated = $request->validate([
                'comp_name'    => 'required|max:30',
                'status'       => 'in:on,of',
                'pend_amt'     => 'required_without:status'
        ]);
        $company_details = Company::where('comp_name', $request['comp_name'])
                                    ->where('user_id', Auth::id())
                                    ->first();
        if($company_details->count() == 0){
            return redirect('/companydetails')->withErrors(['err_msg'=>"Please provide a correct company name :("]);
        }
        try{
            $transaction = new transaction();
            $transaction->company_id = $company_details['id'];
            $transaction->transaction_status = $request['status'] == 'on' ? '1': '0';
            $transaction->pending_amount = $request['pend_amt'] == null ? '0': $request['pend_amt'];
            $transaction->actual_amount  = $request['act_amt'];
            $transaction->save();
            return  redirect('/companydetails')->withErrors(['succ_msg'=>"Successfully added new Transaction :)"]);
        }
        catch(\Exception $e){
            dd($e);
            return redirect('/companydetails')->withErrors(['err_msg'=>"Failed to add a Transaction :("]);
        }
    }

    function companydetails(){
        if(Auth::check()){
            $user = Auth::user();
            $companies_id = Company::select('id')->where('user_id', Auth::id())->get();
            $companies_trans = transaction::whereIn('company_id', $companies_id)->with('company')->orderBy('created_at', 'asc')->get();
            //$companies = Company::whereIn('id', $companies_trans)->with('transactions')->get();
            //dd($companies_trans[0]['company']['user_id']);
            //dd($companies_trans);
            return view('companylist',['user'=>$user, 'transactions'=>$companies_trans]);
        }
        else{
            return redirect('/')->withErrors(['err_msg'=> 'Please do a login first']);
        }
    }

    function deletetransaction(Request $request){
        if(Auth::check()){
            try{
                $transaction = transaction::find($request['trans_id']);
                $company = Company::find($transaction['company_id']);
                $companyname = $company['comp_name'];
                $date = $transaction['created_at'];
                $transaction->delete();
                return  redirect('/companydetails')->withErrors(['succ_msg_delete'=>"Successfully deleted ".$companyname." transaction created on ".$date." :)"]);
            }
            catch(\Exception $e){
                dd($e);
                return redirect('/companydetails')->withErrors(['err_msg_delete'=>"Failed to delete a Company :("]);
            }
        }
        else{
            return redirect('/')->withErrors(['err_msg'=> 'Please do a login first']);
        }
    }
}
