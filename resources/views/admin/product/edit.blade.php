@extends('admin.adminLayout.master')


@section('content')


<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">

                            <div class="pb-3">
                                <a href="{{ url('admin/product') }}" class="btn btn-success btn-sm">View Poduct</a>
                            </div>

                            @if(session('msg'))
                                <div class="alert alert-success">
                                    {{ session('msg') }}
                                </div>
                            @endif
                                <div class="card">
                                    <div class="card-header">Poduct</div>
                                    <div class="card-body">
                                        <form action="{{ route('product.update') }}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            @csrf
                                            <input type="text" name="id" value="@if(isset($product->id)) {{ $product->id }} @endif" />
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Name</label>
                                                        <input id="cc-pament" name="name" type="text" value="@if(isset($product->name)) {{ $product->name }} @endif"  class="form-control" aria-required="true" aria-invalid="false">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Slug</label>
                                                        <input id="cc-pament" name="slug" type="text" value="@if(isset($product->slug)) {{ $product->slug }} @endif"  class="form-control" aria-required="true" aria-invalid="false">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Image</label>
                                                        <input id="cc-pament" name="productimage" type="file"  class="form-control" aria-required="true" aria-invalid="false">
                                                            @if(isset($product->image))
                                                                <img src="{{ asset('admin/productimage/'.$product->image) }}" width="75"/>
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="cc-payment" class="control-label mb-1">Category</label>
                                                            <select name="category_id" class="form-control">
                                                                    <option value="">Select Category</option>
                                                                        @foreach($category as $val)
                                                                            @if($product->category_id==$val->id)
                                                                                <option selected value="{{ $val->id }}">{{ $val->category_name }}</option>
                                                                            @endif
                                                                        @endforeach
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="col-4">
                                                   
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Brand</label>
                                                        <input id="cc-pament" name="brand" type="text" value="@if(isset($product->brand)) {{ $product->brand }} @endif" class="form-control" aria-required="true" aria-invalid="false">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Model</label>
                                                        <input id="cc-pament" name="model" type="text" value="@if(isset($product->model)) {{ $product->model }} @endif" class="form-control" aria-required="true" aria-invalid="false">
                                                    </div>
                                                </div>
                                            </div> 


                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Short Desc</label>
                                                        <textarea id="cc-pament" name="short_desc" type="text"  class="form-control" aria-required="true" aria-invalid="false">{{ $product->short_desc }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                            <label for="cc-payment" class="control-label mb-1">Desc</label>
                                                            <textarea id="cc-pament" name="desc" type="text"  class="form-control" aria-required="true" aria-invalid="false">{{ $product->desc }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Keywords</label>
                                                        <textarea id="cc-pament" name="keywords" type="text"  class="form-control" aria-required="true" aria-invalid="false">{{ $product->keywords }}</textarea>
                                                    </div>
                                                </div>    
                                            </div>

                                            <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="cc-payment" class="control-label mb-1">Technical Specification</label>
                                                            <textarea id="cc-pament" name="technical_specification" type="text"  class="form-control" aria-required="true" aria-invalid="false">{{ $product->technical_specification }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Uses</label>
                                                                <textarea id="cc-pament" name="uses" type="text"  class="form-control" aria-required="true" aria-invalid="false">{{ $product->uses }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Warranty</label>
                                                                <textarea id="cc-pament" name="warranty" type="text"  class="form-control" aria-required="true" aria-invalid="false">{{ $product->warranty }}</textarea>
                                                            </div>
                                                    </div>      
                                                </div>

                                            <div id="product_attr_box">
                                                    <div class="card" id="product_attr_1">
                                                        <div class="card-header">Poduct Attributes</div>
                                                        <?php $loop_count_num = 1; ?>
                                                            <?php foreach($productAttr as $key => $val) { 

                                                                    $loop_count_prev = $loop_count_num;

                                                                ?>

                                                                    <div class="card-body" id="p_attr_{{ $loop_count_num++ }}">
                                                                    
                                                                        <input type="hidden" name="paid[]" value="@if(isset($val->id)) {{ $val->id }} @endif" />
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="cc-payment" class="control-label">Sku</label>
                                                                                        <input id="cc-pament" name="sku[]" type="text" value="@if(isset($val->sku)) {{ $val->sku }}  @endif"  class="form-control" aria-required="true" aria-invalid="false">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="cc-payment" class="control-label">Mrp</label>
                                                                                        <input id="cc-pament" name="mrp[]" type="text" value="@if(isset($val->mrp)) {{ $val->mrp }}  @endif" class="form-control" aria-required="true" aria-invalid="false">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                        <div class="form-group">
                                                                                            <label for="cc-payment" class="control-label">Price</label>
                                                                                            <input id="cc-pament" name="price[]" type="text" value="@if(isset($val->price)) {{ $val->price }}  @endif"  class="form-control" aria-required="true" aria-invalid="false">
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="cc-payment" class="control-label mb-1">Size</label>
                                                                                        <select name="size_id[]" class="form-control">
                                                                                                <option value="">Select Size</option>
                                                                                                @foreach($size as $value)

                                                                                                        @if($val->size_id==$value->id)
                                                                                                            <option selected value="{{ $value->id }}">{{ $value->size }}</option>
                                                                                                        @else
                                                                                                            <option  value="{{ $value->id }}">{{ $value->size }}</option>
                                                                                                        @endif
                                                                                                        
                                                                                                    @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            
                                                                                
                                                                            </div>
                                                                            
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                                <label for="cc-payment" class="control-label mb-1">Color</label>
                                                                                                <select name="color_id[]" class="form-control">
                                                                                                        <option value="">Select Color</option>
                                                                                                            @foreach($color as $value)
                                                                                                            
                                                                                                                @if($val->color_id==$value->id)
                                                                                                                    <option selected value="{{ $value->id }}">{{ $value->color }}</option>
                                                                                                                @else
                                                                                                                    <option  value="{{ $value->id }}">{{ $value->color }}</option>
                                                                                                                @endif

                                                                                                            @endforeach
                                                                                                </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="cc-payment" class="control-label mb-1">Qty</label>
                                                                                        <input id="cc-pament" name="qty[]" type="text" value="@if(isset($val->qty)) {{ $val->qty }}  @endif"  class="form-control" aria-required="true" aria-invalid="false">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="cc-payment" class="control-label mb-1">Image</label>
                                                                                        
                                                                                        <input id="cc-pament" name="producAttrtimage[]" type="file"  class="form-control" aria-required="true" aria-invalid="false">
                                                                                            <img src='{{ asset("admin/productimage/".$val->image)}}' width="75"/>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="col-md-3">
                                                                                    @if($loop_count_num==2)
                                                                                        <button type="button" onclick="add_more()" class="btn btn-success mt-4"><i class="fa fa-plus"></i>&nbspAdd</button>
                                                                                    @else
                                                                                    <a href="{{ url('admin/product_attr/delete/') }}/{{ $product->id }}/{{ $val->id }}">
                                                                                        <button type="button" onclick="remove_more({{ $loop_count_prev }})" class="btn btn-danger mt-4"><i class="fa fa-plus"></i>&nbspRemove</button>
                                                                                    </a>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                       
                                                                    </div>
                                                            <?php } ?>
                                                        </div>    
                                                    </div>
                                            </div>


                                            <!--end -->


                                            <div>
                                                <button type="submit" class="btn btn-lg btn-info btn-block">
                                                    Update
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        
                    </div>
                </div>
            </div>

            <script>

                var loop_count = 1;
                function add_more() {
                    loop_count++;
                    var html = '<div class="card" id="product_attr_'+loop_count+'">';
                    html += ` <div class="card-header">Poduct Attributes</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label">Sku</label>
                                                            <input id="cc-pament" name="sku[]" type="text"  class="form-control" aria-required="true" aria-invalid="false">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label">Mrp</label>
                                                            <input id="cc-pament" name="mrp[]" type="text"  class="form-control" aria-required="true" aria-invalid="false">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label">Price</label>
                                                            <input id="cc-pament" name="price[]" type="text"  class="form-control" aria-required="true" aria-invalid="false">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Size</label>
                                                            <select name="size_id[]" class="form-control">
                                                                <option value="">Select Size</option>
                                                                    @foreach($size as $val)
                                                                        <option value="{{ $val->id }}">{{ $val->size }}</option>
                                                                    @endforeach
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                                                
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Color</label>
                                                        <select name="color_id[]" class="form-control">
                                                            <option value="">Select Color</option>
                                                                @foreach($color as $val)
                                                                    <option value="{{ $val->id }}">{{ $val->color }}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Qty</label>
                                                            <input id="cc-pament" name="qty[]" type="text"  class="form-control" aria-required="true" aria-invalid="false">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        
                                                        <label for="cc-payment" class="control-label mb-1">Image</label>
                                                            <input id="cc-pament" name="producAttrtimage[]" type="file"  class="form-control" aria-required="true" aria-invalid="false">
                                                    </div>
                                                </div>`;

                    html += '<div class="col-md-3"><button type="button" onclick=remove_more("'+loop_count+'") class="btn btn-danger mt-4"><i class="fa fa-minus"></i>&nbspRemove</button></div>';

                    html += `</div></div></div></div>`;
                    jQuery('#product_attr_box').append(html);
                }


                function remove_more(id){
                    jQuery('#product_attr_'+id).remove();
                    // jQuery('#p_attr_'+id).remove();
                }

            </script>


@endsection