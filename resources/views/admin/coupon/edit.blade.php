@extends('admin.adminLayout.master')


@section('content')


<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">

                            <div class="pb-3">
                                <a href="{{ url('admin/category') }}" class="btn btn-success btn-sm">View Category</a>
                            </div>

                            @if(session('msg'))
                                <div class="alert alert-success">
                                    {{ session('msg') }}
                                </div>
                            @endif
                                <div class="card">
                                    <div class="card-header">Coupon</div>
                                    <div class="card-body">
                                        <form action="{{ route('coupon.update') }}" method="post" novalidate="novalidate">
                                        <input type="hidden" name="id" value="@if(isset($coupon->id)) {{ $coupon->id }} @endif"/>
                                            @csrf
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Title</label>
                                                <input id="cc-pament" name="title" type="text" value="@if(isset($coupon->title)) {{ $coupon->title }} @endif" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Code</label>
                                                <input id="cc-name" name="code" type="text" value="@if(isset($coupon->code)) {{ $coupon->code }} @endif" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Value</label>
                                                <input id="cc-pament" name="value" type="text" value="@if(isset($coupon->value)) {{ $coupon->value }} @endif" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                           
                                            <div>
                                                <button type="submit" class="btn btn-lg btn-info btn-block">
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection