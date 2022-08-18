@extends('admin/layout')
@section('page_title','Voucher')
@section('voucher_select','active')
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
    <h2 class="title-1">Vouchers</h2>
    <a href="voucher/manage_voucher">
      <button type="button" class="btn btn-success">Create voucher</button>
    </a>
</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Voucher name</th>
                        <th>Voucher code</th>
                        <th>Voucher value</th>
                        <th>Voucher type</th>
                        <th>Min order amount</th>
                        <th>Is one time</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->title}}</td>
                        <td>{{$list->code}}</td>
                        <td>{{$list->value}}</td>
                        <td>
                            @if($list->type==1)
                             <a href="{{url('admin/voucher/type/0')}}/{{$list->id}}">
                             <input class="btn btn-outline-success" type="reset" value="Percent">
                             @elseif($list->type==0)
                              <a href="{{url('admin/voucher/type/1')}}/{{$list->id}}">
                              <input class="btn btn-outline-success" type="reset" value="Amount">
                            @endif
                        </td>
                        <td>{{$list->min_order_amount}}</td>
                        <td>
                            @if($list->is_one_time==1)
                             <a href="{{url('admin/voucher/is_one_time/0')}}/{{$list->id}}">
                             <input class="btn btn-outline-success" type="reset" value="Yes">
                             @elseif($list->is_one_time==0)
                              <a href="{{url('admin/voucher/is_one_time/1')}}/{{$list->id}}">
                              <input class="btn btn-outline-danger" type="reset" value="No">
                            @endif
                        </td>
                        <td>
                            @if($list->status==1)
                             <a href="{{url('admin/voucher/status/0')}}/{{$list->id}}">
                             <input class="btn btn-outline-success" type="reset" value="Active">
                             @elseif($list->status==0)
                              <a href="{{url('admin/voucher/status/1')}}/{{$list->id}}">
                              <input class="btn btn-outline-warning" type="reset" value="Inactive">
                            @endif
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{url('admin/voucher/delete/')}}/{{$list->id}}"><button type="button" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                    <i class="zmdi zmdi-delete"></i>&nbsp;
                                </button>                               
                                <a href="{{url('admin/voucher/manage_voucher/')}}/{{$list->id}}"><button type="button" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                    <i class="zmdi zmdi-edit"></i>&nbsp;
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