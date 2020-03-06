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
        return view('adminpages.category');
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

}
