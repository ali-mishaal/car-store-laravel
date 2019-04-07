<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use Hash;

class dashboardController extends Controller
{
    
    public function __construct()
    {
       $this->middleware('auth:admin');
    }

    public function index()
    {

    	return view('dashboard.adminindex');
    }

    public function setting()
    {

    	return view('dashboard.setting');
    }

    public function check_pass(Request $request)
    {
      
    	$data = $request->all();
    	$current_password = $data['current_pass'];
        
        $check_password = Auth::guard('admin')->user()->password;
        if(empty($current_password))
        {
          return "nothing";
        }else
        {
          if(Hash::check($current_password , $check_password))
          {
            return "true"; 
          }else
          {
            return "false";
          }

        }
        

    }

    public function update_pass(Request $request)
    {
      $this->validate($request , 
      	[
          'cr-password'=>'required',
          'nw-password'=>'required:confirmed',
          'cn-password'=>'required'
      	]);

       $user = Admin::find(Auth::guard('admin')->user()->id);
       $user_pass = $user->password;
       $input_pass = $request->input('cr-password');
       if(Hash::check($input_pass , $user_pass))
       {
       	 $user->password = Hash::make($request->input('nw-password'));
       	 $user->save();

       	 return redirect(route('setting'))->with('success-setting' , 'password updated success');
       }else
       {
       	 return redirect(route('setting'))->with('error-setting' , 'password updated failed');
       }
    }
}
