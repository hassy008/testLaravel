<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //added by hassy008
use Illuminate\Support\Facades\Redirect; //added by hassy008
use Session;
session_start();

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->adminAuthCheck();
        return view('admin.login.login');
    }

    public function adminLogin(Request $request){
        $email    = $request->email;
        $password = $request->password;
        $result   = DB::table('admin')
                     ->where('admin_email', $email)
                     ->where('password', md5($password))
                     ->first();
     /*   echo "<pre>";
        print_r($result);
        exit();*/
        if ($result) {
           Session::put('admin_name',$result->admin_name); 
           Session::put('admin_id', $result->admin_id);
        //  return view('admin.master');  
            return redirect::to('/dashboard');
        } else{
          Session::put('exception','Invalid Email or Password. <br> Try again');  
          return redirect::to('/xyz');
        }
    }

    //authentication check
    public function adminAuthCheck(){
        $admin_id = Session::get('admin_id');
      if ($admin_id) {
        return redirect('/dashboard')->send();  
      } else{
        return ;
      }
    }

    
}
