<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Http\Requests\Front\UserFrontRegisterFormRequest;
use App\Package;
use App\Traits\JobSeekerPackageTrait;

class CandidateController extends Controller
{
    use JobSeekerPackageTrait;
 
    public function myregistration(){
        return view('candi.register1');
    }

    public function myregistrationsave(UserFrontRegisterFormRequest $request){
        //dd($request->all());
        $data = new User();
        //$data->candidate_or_employer = $request->candidate_or_employer;
        $data->first_name = $request->first_name;
        $data->name = str_slug($request->first_name);
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
    public function employerRegistration(UserFrontRegisterFormRequest $request){
        //dd($request->all());
        $data = new Company();
        $data->name = $request->first_name;
        $data->email = $request->email;        
        if($request->password_confirmation != $request->password){
            return redirect('/register-cmpy')->with('message', 'Password and Confirm password must be same');
        }
        $data->password = bcrypt($request->password);
        $data->phone = $request->mobile_num;
        $data->save();       
        
        $data->slug = str_slug($data->name, '-').'-'.$data->id;

        $data->update();
        $package_id = 1;
        $package = Package::find($package_id);
		$this->addJobSeekerPackage($data, $package);
        if($data){
            return redirect('/company-home')->with('message', 'Welcome to our site');
        }else{
            return redirect('/register-cmpy')->with('message', 'Something went wrong Do again!');
        }
        
    }

}
