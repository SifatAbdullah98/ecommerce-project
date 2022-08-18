@extends('admin/layout')
@section('page_title','Customer Details')
@section('customer_select','active')
@section('container')
   @if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
     {{session('message')}}
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	 </button>
    </div>
   @endif
<div class="overview-wrap">
    <h2 class="title-1">Customer Details</h2>
</div>
<div class="card">
    <div class="card-body">
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <h4 class="card-title">Customer Details</h4>
                    <thead>
                        <tr>
                            <th>
                             Tile
                            </th>
                            <th>
                             Information
                            </th>
                        </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{$customer_detais->name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$customer_detais->email}}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{$customer_detais->phone}}</td>
                    </tr>
                    <tr>
                        <td>Division</td>
                        <td>{{$customer_detais->division}}</td>
                    </tr>
                    <tr>
                        <td>District</td>
                        <td>{{$customer_detais->district}}</td>
                    </tr>
                    <tr>
                        <td>Area</td>
                        <td>{{$customer_detais->area}}</td>
                    </tr>
                    <tr>
                        <td>Details Address</td>
                        <td>{{$customer_detais->details_address}}</td>
                    </tr>
                    <tr>
                        <td>Customer since</td>
                        <td>{{\carbon\carbon::parse($customer_detais->created_at)->format('d-m-y')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
<div class="card">
    <div class="card-body">
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <h4 class="card-title">Order Details</h4>
                    <thead>
                        <tr>
                            <th>
                             order Id
                            </th>
                            <th>
                             Order date
                            </th>
                            <th>
                             Order amount
                            </th>
                            <th>
                             Order staus
                            </th>
                        </tr>
                    </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection