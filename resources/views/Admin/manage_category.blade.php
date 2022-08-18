@extends('admin/layout')
@section('category_select','active')
@section('page_title','Update Category')
@section('container')
  @if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
     {{session('message')}}
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	 </button>
    </div>
   @endif
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Update Category</h3>
            </div>
            <hr>
            <form action="{{route('manage_category_process')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category_name" class="control-label mb-1">Category Name</label>
                    <input id="category_name" value="{{$category_name}}" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                </div>
                <div class="form-group">
                    <label for="category_slug" class="control-label mb-1">Category Slug</label>
                    <input id="category_slug" value="{{$category_slug}}" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                </div>
                <div class="form-group">
                    <label for="parent_category_id" class="control-label mb-1">Parent Category</label>
                    <select id="parent_category_id" value="{{$parent_category_id}}" name="parent_category_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        <option value="0">Select Category</option>
                        @foreach($category as $list)
                        @if($parent_category_id==$list->id)
                        <option selected value="{{$list->id}}">
                        @else
                        <option value="{{$list->id}}">
                        @endif
                        {{$list->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <!--<div class="form-group">
                    <label for="category_image" class="control-label mb-1">Image</label>
                    <input id="category_image" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                </div>-->
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Submit
                    </button>
                </div>
                <input type="hidden" name="id" value="{{$id}}"/>
            </form>
        </div>
    </div>
</div>
@endsection