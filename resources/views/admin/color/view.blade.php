@extends('admin.adminLayout.master')


@section('content')

<div class="main-content">

                            

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                            <div>
                                <a href="{{ url('admin/color/add') }}" class="btn btn-success btn-sm">Add Color</a>
                            </div>

                            @if(session('msg'))
                                <div class="alert alert-danger">
                                    {{ session('msg') }}
                                </div>
                            @endif

                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Size</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($colorList as $value)
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ $value->color }}</td>
                                                    <td>
                                                        <a href='{{ url("admin/color/delete/$value->id") }}' class="btn btn-danger btn-sm">Delete</a>
                                                        <a href='{{ url("admin/color/edit/$value->id") }}' class="btn btn-primary btn-sm">Edit</a>

                                                        <?php if($value->status==0) { ?>
                                                            <a href='{{ url("admin/color/status/deactive/$value->id") }}' class="btn btn-warning btn-sm">Deactive</a>
                                                        
                                                        <?php } elseif($value->status==1) { ?>
                                                            <a href='{{ url("admin/color/status/active/$value->id") }}' class="btn btn-success btn-sm">Active</a>
                                                        
                                                        <?php } ?>

                                                    </td>
                                                </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection