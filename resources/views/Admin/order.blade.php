@extends('admin/layout')
@section('page_title','order')
@section('order_select','active')
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
    <h2 class="title-1">Order</h2>
</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>order Id</th>
                        <th>Order date</th>
                        <th>Phone</th>
                        <th>Division</th>
                        <th>District</th>
                        <th>Order status</th>
                        <th>Delivery status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{\carbon\carbon::parse($list->created_at)->format('d-m-y h:i')}}</td>
                        <td>{{$list->phone}}</td>
                        <td>{{$list->division}}</td>
                        <td>{{$list->district}}</td>
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
                        <td>
                            <div class="table-data-feature">
                                <a href="{{url('admin/order/delete/')}}/{{$list->id}}"><button type="button" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                    <i class="zmdi zmdi-delete"></i>&nbsp;
                                </button>                                
                            </div>
                        </td>  
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection