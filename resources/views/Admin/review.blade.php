@extends('admin/layout')
@section('page_title','review')
@section('review_select','active')
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
    <h2 class="title-1">Review</h2>
</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Date given</th>
                        <th>Review</th>
                        <th>Review status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{\carbon\carbon::parse($list->created_at)->format('d-m-y')}}</td>
                        <td>{{$list->review}}</td>
                        <td>
                            @if($list->review_status==1)
                             <a href="{{url('admin/review/review_status/1')}}/{{$list->id}}">
                             <input class="btn btn-outline-success" type="reset" value="Approved">
                             @elseif($list->review_status==0)
                              <a href="{{url('admin/review/review_status/1')}}/{{$list->id}}">
                              <input class="btn btn-outline-warning" type="reset" value="Pending">
                            @endif
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{url('admin/review/delete/')}}/{{$list->id}}"><button type="button" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
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