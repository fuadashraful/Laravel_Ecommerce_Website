<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

class ManufactureController extends Controller
{
    public function add_manufacture()
    {
        
        return view('adminpages.add_manufacture');
    }


    public function save_manufacture(Request $request)
    {
       $data=array();
       $data['name']=$request->manufactureName;
       $data['description']=$request->manufactureDescription;
       $data['publication_status']=$request->publicationStatus;
       if(empty($data['publication_status']))$data['publication_status']=0;
       
       DB::table('manufacturer_tbl')->insert($data);

       Session::put('message','Manufacture added successfully !');

       return Redirect::to('/admin/add_manufacture/');

    }
}
