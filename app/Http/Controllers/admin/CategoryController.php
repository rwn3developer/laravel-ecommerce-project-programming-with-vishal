<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categoryList'] = Category::All();
        return view('admin/category/view',$data);
    }

    public function add()
    {
        return view('admin/category/add');
    }

    public function addData(Request $request)
    {    
            $model = new Category;
            $model->category_name = $request->category;
            $model->category_slug = $request->category_slug;
            $model->save();
            return redirect('admin/category/add')->with('msg','Category Inserted Successfully');
    }

    public function deleteData($id)
    {
        Category::find($id)->delete();
    	return redirect('admin/category')->with('msg','Category Delete Successfully');
    }

    public function editData($id)
    {
        $data['category'] = Category::where('id',$id)->first();
        return view('admin/category/edit',$data);
    }

    public function updateData(Request $request)
    {
            $id = $request->id;
            $data = array('category_name'=>$request->category,'category_slug'=>$request->category_slug);
            Category::where('id',$id)->update($data);
            return redirect('admin/category')->with('msg','Category Update Successfully'); 
    }
}
