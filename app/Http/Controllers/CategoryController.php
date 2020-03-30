<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use DB;
use Session;
session_start();

class CategoryController extends Controller
{
    public function index()
    {
        return view('adminpages.admin_add_category');
    }

    public function showCategory()
    {
        $all_category_info=DB::table('category_tbl')->get();
        return view('adminpages.all_category')->with('all_category',$all_category_info);
    }

    public function saveCategory(Request $request)
    {
        $data=array();
        $data['category_id']=$request->category_id;
        $data['category_name']=$request->categoryName;
        $data['category_description']=$request->categoryDescription;
        $data['publication_status']=$request->publicationStatus;

        if(empty($data['publication_status']))$data['publication_status']=0;

        DB::table('category_tbl')->insert($data);
        Session::put('message','Category added Successfully');
        return Redirect::to('/admin/add-category');

    //    echo "<pre>";
    //     print_r($data);
    //    echo "</pre>";
    }


    public function toggleCategoryStatus($cat_id,$cat_status)
    {

        if($cat_status==1)
        {
            DB::table('category_tbl')->where('category_id',$cat_id)->update(['publication_status' => 0 ]);
            Session::put('message-deactive','Category Deactivated Successfully');       
        }
        else if($cat_status==0)
        {
            DB::table('category_tbl')->where('category_id',$cat_id)->update(['publication_status' => 1 ]);
            Session::put('message-active','Category Activated Successfully');  
        }
        else
        {
            Session::put('message','Something Wrong can not toggle status');
        }
   
        return Redirect::to('/admin/show-category/');
    }



    public function updateCategory($cat_id)
    {
       
        $category=DB::table('category_tbl')->where('category_id',$cat_id)->first();
        return view('adminpages.update_category')->with('category',$category);
    }

    public function update_post(Request $request,$cat_id)
    {
         
       
          $data=array();
          $data['category_name']=$request->categoryName;
          $data['category_description']=$request->categoryDescription;
          
          DB::table('category_tbl')->where('category_id',$cat_id)->update($data);
          Session::put('message-delete','Category updated Successfully');
          return Redirect::to('/admin/dashboard');
    }


    public function delete_category($cat_id)
    {
        DB::table('category_tbl')->where('category_id',$cat_id)->delete();

        return Redirect::to('/admin/show-category');
    }

}
