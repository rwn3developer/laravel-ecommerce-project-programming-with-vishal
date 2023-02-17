@extends('admin.adminLayout.master')


@section('content')

<div class="main-content">

                            

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                            <div>
                                <a href="{{ url('admin/category/add') }}" class="btn btn-success btn-sm">Add Category</a>
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
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categoryList as $value)
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ $value->category_name }}</td>
                                                    <td>{{ $value->category_slug }}</td>
                                                    <td>
                                                        <a href='{{ url("admin/category/delete/$value->id") }}' class="btn btn-danger btn-sm">Delete</a>
                                                        <a href='{{ url("admin/category/edit/$value->id") }}' class="btn btn-primary btn-sm">Edit</a>
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