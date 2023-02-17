<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $data['colorList'] = Color::All();
        return view('admin/color/view',$data);
    }

    public function add()
    {
        return view('admin/color/add');
    }

    public function addData(Request $request)
    {   
            $model = new Color;
            $model->color = $request->color;
            $model->save();
            return redirect('admin/color/add')->with('msg','Color Inserted Successfully');
    }

    public function deleteData($id)
    {
        Color::find($id)->delete();
    	return redirect('admin/color')->with('msg','Color Delete Successfully');
    }

    public function editData($id)
    {
        $data['color'] = Color::where('id',$id)->first();
        return view('admin/color/edit',$data);
    }

    public function updateData(Request $request)
    {
            $id = $request->id;
            $data = array('color'=>$request->color);
            Color::where('id',$id)->update($data);
            return redirect('admin/color')->with('msg','Color Update Successfully'); 
    }

    public function statusDeactive($id)
    {
        $data = array('status'=>1);
        Color::where('id',$id)->update($data);
        return redirect('admin/color')->with('msg','Status Update Successfully'); 
    }

    public function statusactive($id)
    {
        $data = array('status'=>0);
        Color::where('id',$id)->update($data);
        return redirect('admin/color')->with('msg','Status Update Successfully'); 
    }
}
