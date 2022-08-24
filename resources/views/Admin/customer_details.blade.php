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
                             Order staus
                            </th>
                            <th>
                             Delivery staus
                            </th>
                        </tr>
                    </thead>
                    @foreach($order as $list)
                     <tbody>
                        <tr>
                            <td>
                              {{$list->id}}
                            </td>
                            <td>
                              {{\carbon\carbon::parse($list->created_at)->format('d-m-y')}}
                            </td>  
                            <td>
                            @if($list->order_status==1)
                             <a href="{{url('admin/order/order_status/1')}}/{{$list->id}}">
                             <input class="btn btn-outline-success" type="reset" value="Approved">
                             @elseif($list->order_status==0)
                              <a href="{{url('admin/order/order_status/1')}}/{{$list->id}}">
                              <input class="btn btn-outline-warning" type="reset" value="Pending">
                            @endif
                            </td> 
                            <td>
                        @if($list->order_status==1)
                            @if($list->delivery_status==0)
                             <a href="{{url('admin/order/delivery_status/1')}}/{{$list->id}}">
                             <input class="btn btn-outline-primary" type="reset" value="Pending">
                             @elseif($list->delivery_status==1)
                              <a href="{{url('admin/order/delivery_status/2')}}/{{$list->id}}">
                              <input class="btn btn-outline-warning" type="reset" value="Processing">
                             @elseif($list->delivery_status==2)
                              <a href="{{url('admin/order/delivery_status/3')}}/{{$list->id}}">
                              <input class="btn btn-outline-warning" type="reset" value="Dispatched">
                             @elseif($list->delivery_status==3)
                              <a href="{{url('admin/order/delivery_status/3')}}/{{$list->id}}">
                              <input class="btn btn-outline-success" type="reset" value="Delivered">
                            @endif
                        @endif
                            </td>  
                        </tr>
                     </tbody>
                    @endforeach
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection