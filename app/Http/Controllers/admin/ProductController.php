<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $data['productList'] = Product::All();
        return view('admin/product/view',$data);
    }

    public function add()
    {
        //$data['category'] = DB::table('categories')->where(['status'=>1])->get();
        $data['category'] = DB::table('categories')->get();
        $data['size'] = DB::table('sizes')->where(['status'=>1])->get();
        $data['color'] = DB::table('colors')->where(['status'=>1])->get();
        return view('admin/product/add',$data);
    }

    public function addData(Request $request)
    {   
            $model = new Product;

            $image_name = '';
            if($request->file('productimage')){
                $file = $request->file('productimage');
    		    $image_name = rand(11111,99999).".".$file->getClientOriginalExtension();
    		    $file->move(public_path('admin/productimage/'),$image_name);
            }

            $model->category_id = $request->category_id;
            $model->name = $request->name;
            $model->slug = $request->slug;
            $model->image = $image_name;
            $model->brand = $request->brand;
            $model->model = $request->model;
            $model->short_desc = $request->short_desc;
            $model->desc = $request->desc;
            $model->keywords = $request->keywords;
            $model->technical_specification = $request->technical_specification;
            $model->uses = $request->uses;
            $model->warranty = $request->warranty;	
            $model->save();
            $products_id = $model->id;
                //productAttr start
                $sku = $request->post('sku');
                $mrp = $request->post('mrp');
                $price = $request->post('price');
                $qty = $request->post('qty');
                $size_id = $request->post('size_id');
                $color_id = $request->post('color_id');

                    //multiple image upload
                    if($request->file('producAttrtimage')){
                        $pimages = array();
                        foreach($request->file('producAttrtimage') as $file){
                            $name = rand(1,100).'.'.$file->getClientOriginalExtension();
                            $file->move(public_path('admin/productimage/'),$name);
                            $pimages[] = $name;
                        }  
                    }
                    //multiple image upload end

                    foreach($sku as $key => $value) {
                        $product['products_id'] = $products_id;
                        $product['sku'] = $sku[$key];
                        $product['image'] = $pimages[$key];
                        $product['mrp'] = $mrp[$key];
                        $product['price'] = $price[$key];
                        $product['qty'] = $qty[$key];
                        $product['size_id'] = $size_id[$key];
                        $product['color_id'] = $color_id[$key];
                        DB::table('products_attr')->insert($product);
                    }
            //productAttr end
            return redirect('admin/product/add')->with('msg','Product Inserted Successfully');
    }

    public function deleteData($id)
    {
        $adminR = Product::where('id',$id)->first();
    	$path = public_path("admin/productimage/$adminR->image");
    	if(file_exists($path))
    	{
    		unlink($path);
    	}
        Product::find($id)->delete();

        //multiple image delete start
        $productAttr = DB::table('products_attr')->where(['products_id'=>$id])->get();
        foreach($productAttr as $key => $value) {
            $path = public_path("admin/productimage/$value->image");
            if(file_exists($path))
            {
                unlink($path);
            }
            DB::table('products_attr')->where(['products_id'=>$id])->delete();
        }
         //multiple image delete start

    	return redirect('admin/product')->with('msg','Product Delete Successfully');
    }

    public function editData($id)
    {
        $data['product'] = Product::where('id',$id)->first();
        $data['category'] = DB::table('categories')->where(['status'=>1])->get();
        $data['size'] = DB::table('sizes')->where(['status'=>1])->get();
        $data['color'] = DB::table('colors')->where(['status'=>1])->get();
        $data['productAttr'] = DB::table('products_attr')->where(['products_id'=>$id])->get();
        return view('admin/product/edit',$data);
    }

    public function updateData(Request $request)
    {
            $image_name = "";
            if($request->file('productimage'))
            {
                $file = $request->file('productimage');
                $image_name = rand(11111,99999).".".$file->getClientOriginalExtension();
                $file->move(public_path('admin/productimage/'),$image_name);

                $id = $request->id;
                $adminR = Product::where('id',$id)->first();
                $path = public_path("admin/productimage/$adminR->image");
                if(file_exists($path))
                {
                    unlink($path);
                }
            }
            else
            {
                $id = $request->id;
                $adminR = Product::where('id',$id)->first();
                $image_name = $adminR->image;
            }    

            $data = array('category_id'=>$request->category_id,'name'=>$request->name,'slug'=>$request->slug,'image'=>$image_name,'brand'=>$request->brand,'model'=>$request->model,'short_desc'=>$request->short_desc,'desc'=>$request->desc,'keywords'=>$request->keywords,'technical_specification'=>$request->technical_specification,'uses'=>$request->uses,'warranty'=>$request->warranty);
            Product::where('id',$request->id)->update($data);

                $products_id = $request->paid;

                $sku = $request->post('sku');  
                 $mrp = $request->post('mrp');
                 $price = $request->post('price');
                 $qty = $request->post('qty');
                 $size_id = $request->post('size_id');
                 $color_id = $request->post('color_id');
                
                 
                 foreach($products_id as $key => $value) { 
  
                    $product['sku'] = $sku[$key];

                    //multiple image edit task start
                    if($request->hasFile("producAttrtimage.$key"))
                    {
                        $alli = DB::table('products_attr')->where(['id'=>$products_id[$key]])->get();
                        foreach($alli as $v){
                            
                            $path = public_path("admin/productimage/$v->image");
                            if(file_exists($path))
                            {
                                unlink($path);
                            }
                        }

                            $name = $request->file("producAttrtimage.$key");
                            $filename = rand(111,999).".".$name->extension();
                            $name->move(public_path('admin/productimage/'),$filename);
                            $product['image'] = $filename;
                                                           
                    }
                    else{
                        $alli = DB::table('products_attr')->where(['id'=>$products_id[$key]])->get();

                        foreach($alli as $v){
                            $product['image'] = $v->image;
                        }
                    }
                    //multiple image edit task end
                        $product['mrp'] = $mrp[$key];
                        $product['price'] = $price[$key];
                        $product['qty'] = $qty[$key];
                        $product['size_id'] = $size_id[$key];
                        $product['color_id'] = $color_id[$key]; 
                        DB::table('products_attr')->where(['id'=>$products_id[$key]])->update($product);
    
                    }
        
            return redirect('admin/product')->with('msg','Product Update Successfully'); 
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


    public function productattrdelete($pid,$paid)
    {     
        $adminR = DB::table('products_attr')->where(['id'=>$paid])->first();
        // echo "<pre>";
        // print_r($adminR);die;
    	$path = public_path("admin/productimage/$adminR->image");
    	if(file_exists($path))
    	{
    		unlink($path);
    	}
        DB::table('products_attr')->where(['id'=>$paid])->delete();
        return redirect('admin/product/edit/'.$pid);
    }

}
