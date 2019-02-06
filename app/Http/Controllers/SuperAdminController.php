<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect; //added by hassy008
session_start();


class SuperAdminController extends Controller
{
    
     public function index()
    {
       $this->authCheck();
       $admin_home=view('admin.home.homeContent');

        return view('admin.admin_master')
                ->with('mainContent', $admin_home);
    }

    public function logout(){
        Session::put('admin_name','');
        Session::put('admin_id','');

        //message after logout
        Session::put('message','You are successfully logout');
        return redirect::to('/xyz');
    }

    //authentication check
    public function authCheck(){
        $admin_id = Session::get('admin_id');
      if ($admin_id) {
        return;  
      } else{
        return redirect('/xyz')->send();
      }
    }


}
