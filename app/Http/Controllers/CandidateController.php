<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CandidateController extends Controller
{
 
    public function myregistration(){
        return view('candi.register1');
    }

    public function myregistrationsave(Request $request){
        //dd($request->all());
        $data = new User();
        //$data->candidate_or_employer = $request->candidate_or_employer;
        $data->first_name = $request->first_name;
        $data->email = $request->email;        
        if($request->password_confirmation != $request->password){
            return redirect('/register-cmpy')->with('message', 'Password and Confirm password must be same');
        }
        $data->password = bcrypt($request->password);
        $data->mobile_num = $request->mobile_num;
       // dd($data);
        $data->save();
        if($data){
            return redirect('/')->with('message', 'Welcome to our site');
        }else{
            return redirect('/register-cmpy')->with('message', 'Something went wrong Do again!');
        }
    }

}
