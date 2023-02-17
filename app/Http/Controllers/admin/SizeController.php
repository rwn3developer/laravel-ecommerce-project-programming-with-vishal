<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    public function index()
    {
        $data['sizeList'] = Size::All();
        return view('admin/size/view',$data);
    }

    public function add()
    {
        return view('admin/size/add');
    }

    public function addData(Request $request)
    {   
            $model = new Size;
            $model->size = $request->size;
            $model->save();
            return redirect('admin/size/add')->with('msg','Size Inserted Successfully');
    }

    public function deleteData($id)
    {
        Size::find($id)->delete();
    	return redirect('admin/size')->with('msg','Size Delete Successfully');
    }

    public function editData($id)
    {
        $data['size'] = Size::where('id',$id)->first();
        return view('admin/size/edit',$data);
    }

    public function updateData(Request $request)
    {
            $id = $request->id;
            $data = array('size'=>$request->size);
            Size::where('id',$id)->update($data);
            return redirect('admin/size')->with('msg','Size Update Successfully'); 
    }

    public function statusDeactive($id)
    {
        $data = array('status'=>1);
        Size::where('id',$id)->update($data);
        return redirect('admin/size')->with('msg','Status Update Successfully'); 
    }

    public function statusactive($id)
    {
        $data = array('status'=>0);
        Size::where('id',$id)->update($data);
        return redirect('admin/size')->with('msg','Status Update Successfully'); 
    }
}
