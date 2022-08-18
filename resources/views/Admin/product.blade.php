@extends('admin/layout')
@section('page_title','product')
@section('product_select','active')
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
    <h2 class="title-1">Product</h2>
    <a href="product/manage_product">
      <button type="button" class="btn btn-success"> Add Product</button>
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
                        <th>Product name</th>
                        <th>Product slug</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Discounted</th>
                        <th>Trending</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->product_slug}}</td>
                        <td><img width="30px" src="{{asset('/storage/media/'.$list->image)}}"/></td>
                        <td>
                            @if($list->is_featured==1)
                             <a href="{{url('admin/product/is_featured/0')}}/{{$list->id}}">
                             <input class="btn btn-outline-success" type="reset" value="Yes">
                             @elseif($list->is_featured==0)
                              <a href="{{url('admin/product/is_featured/1')}}/{{$list->id}}">
                              <input class="btn btn-outline-warning" type="reset" value="NO">
                            @endif
                        </td>
                        <td>
                            @if($list->is_discounted==1)
                             <a href="{{url('admin/product/is_discounted/0')}}/{{$list->id}}">
                             <input class="btn btn-outline-success" type="reset" value="Yes">
                             @elseif($list->is_discounted==0)
                              <a href="{{url('admin/product/is_discounted/1')}}/{{$list->id}}">
                              <input class="btn btn-outline-warning" type="reset" value="NO">
                            @endif
                        </td>
                        <td>
                            @if($list->is_trending==1)
                             <a href="{{url('admin/product/is_trending/0')}}/{{$list->id}}">
                             <input class="btn btn-outline-success" type="reset" value="Yes">
                             @elseif($list->is_trending==0)
                              <a href="{{url('admin/product/is_trending/1')}}/{{$list->id}}">
                              <input class="btn btn-outline-warning" type="reset" value="No">
                            @endif
                        </td>
                        <td>
                            @if($list->status==1)
                             <a href="{{url('admin/product/status/0')}}/{{$list->id}}">
                             <input class="btn btn-outline-success" type="reset" value="Active">
                             @elseif($list->status==0)
                              <a href="{{url('admin/product/status/1')}}/{{$list->id}}">
                              <input class="btn btn-outline-warning" type="reset" value="Inactive">
                            @endif
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{url('admin/product/delete/')}}/{{$list->id}}"><button type="button" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                    <i class="zmdi zmdi-delete"></i>&nbsp;
                                </button>                               
                                <a href="{{url('admin/product/manage_product/')}}/{{$list->id}}"><button type="button" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
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