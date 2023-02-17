<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index()
    {
        $data['couponList'] = Coupon::All();
        return view('admin/coupon/view',$data);
    }

    public function add()
    {
        return view('admin/coupon/add');
    }

    public function addData(Request $request)
    {   
            $model = new Coupon;
            $model->title = $request->title;
            $model->code = $request->code;
            $model->value = $request->value;
            $model->save();
            return redirect('admin/coupon/add')->with('msg','Coupon Inserted Successfully');
    }

    public function deleteData($id)
    {
        Coupon::find($id)->delete();
    	return redirect('admin/coupon')->with('msg','Coupon Delete Successfully');
    }

    public function editData($id)
    {
        $data['coupon'] = Coupon::where('id',$id)->first();
        return view('admin/coupon/edit',$data);
    }

    public function updateData(Request $request)
    {
            $id = $request->id;
            $data = array('title'=>$request->title,'code'=>$request->code,'value'=>$request->value);
            Coupon::where('id',$id)->update($data);
            return redirect('admin/coupon')->with('msg','Category Update Successfully'); 
    }

    public function statusDeactive($id)
    {
        $data = array('status'=>1);
        Coupon::where('id',$id)->update($data);
        return redirect('admin/coupon')->with('msg','Status Update Successfully'); 
    }

    public function statusactive($id)
    {
        $data = array('status'=>0);
        Coupon::where('id',$id)->update($data);
        return redirect('admin/coupon')->with('msg','Status Update Successfully'); 
    }
}
