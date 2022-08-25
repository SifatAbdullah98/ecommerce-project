@extends('admin/layout')
@section('page_title','Category')
@section('category_select','active')
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
    <h2 class="title-1">Categories</h2>
    <a href="category/manage_category">
      <button type="button" class="btn btn-success"> Add Category</button>
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
                        <th>Category name</th>
                        <th>Category slug</th>
                        <th>Category Image</th>
                        <th>Show on home page</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->category_name}}</td>
                        <td>{{$list->category_slug}}</td>
                        <td><img width="60px" src="{{asset('storage/media/category/'.$list->category_image)}}"/></td>
                        <td>
                            @if($list->home==1)
                             <a href="{{url('admin/category/home/0')}}/{{$list->id}}">
                             <input class="btn btn-outline-success" type="reset" value="Yes">
                             @elseif($list->home==0)
                              <a href="{{url('admin/category/home/1')}}/{{$list->id}}">
                              <input class="btn btn-outline-warning" type="reset" value="No">
                            @endif
                        </td>
                        <td>
                            @if($list->status==1)
                             <a href="{{url('admin/category/status/0')}}/{{$list->id}}">
                             <input class="btn btn-outline-success" type="reset" value="Active">
                             @elseif($list->status==0)
                              <a href="{{url('admin/category/status/1')}}/{{$list->id}}">
                              <input class="btn btn-outline-warning" type="reset" value="Inactive">
                            @endif
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{url('admin/category/delete/')}}/{{$list->id}}"><button type="button" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                    <i class="zmdi zmdi-delete"></i>&nbsp;
                                </button>                               
                                <a href="{{url('admin/category/manage_category/')}}/{{$list->id}}"><button type="button" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
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