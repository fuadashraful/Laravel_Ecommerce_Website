<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
session_start();

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

    public function show_manufacture()
    {
        $all_manufacturer=DB::table('manufacturer_tbl')->get();
        return view('adminpages.all_manufacture')->with('all_manufacturer',$all_manufacturer);
    }


    public function toggleManufactureStatus($manufac_id,$manufac_status)
    {
        if($manufac_status==1)
        {
            DB::table('manufacturer_tbl')->where('id',$manufac_id)->update(['publication_status' => 0 ]);
            Session::put('message-deactive','Manufactureer Deactivated Successfully');       
        }
        else if($manufac_status==0)
        {
            DB::table('manufacturer_tbl')->where('id',$manufac_id)->update(['publication_status' => 1 ]);
            Session::put('message-deactive','Manufactureer Activated Successfully');
        }
        else
        {
            Session::put('message','Something Wrong can not toggle status');
        }
   
        return Redirect::to('/admin/show-manufacture/');
    }


    public function delete_manufacture($manufac_id)
    {
        DB::table('manufacturer_tbl')->where('id',$manufac_id)->delete();
        return Redirect::to('/admin/show-manufacture/');
    }

    public function update_manufacture($manufac_id)
    {
        $manufacture=DB::table('manufacturer_tbl')->where('id',$manufac_id)->first();
        return view('adminpages.update_manufacture')->with('manufacture', $manufacture);
    }


    public function update_manufacture_post(Request $request,$manufac_id)
    {

          $data=array();
          $data['name']=$request->manufactureName;
          $data['description']=$request->manufactureDescription;
          DB::table('manufacturer_tbl')->where('id',$manufac_id)->update($data);
          Session::put('message-delete','Manufacture Updated Successfully');
          return Redirect::to('/admin/dashboard');
    }


}
