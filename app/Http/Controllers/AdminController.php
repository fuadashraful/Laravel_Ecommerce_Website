<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Redirect;
use Session;
use DB;
session_start();

class AdminController extends Controller
{
    public function login()
    {
        return view('adminpages.login');
    }

    public function dashboard()
    {
        return view('adminpages.dashboard');
    }

    
    public function admin_login_authenticate(Request $request)
    {
         $admin_email=$request->admin_email;
         $admin_password=md5($request->admin_password);
         $result=DB::table('admin_tbl')
         ->where('admin_email',$admin_email)
         ->where('admin_password',$admin_password)->first();
         
         if($result)
         {
             Session::put('admin_name',$result->admin_name);
             Session::put('admin_id',$result->id);
             return Redirect::to('/admin/dashboard/');
         }
         else
         {
             Session::put('message','Email or password not matched');
             return Redirect::to('/admin/login/');
         }
    }
}
