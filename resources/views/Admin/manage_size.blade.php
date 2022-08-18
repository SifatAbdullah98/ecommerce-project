@extends('admin/layout')
@section('category_select','active')
@section('page_title','Update Size')
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
                <h3 class="text-center title-2">Update Size</h3>
            </div>
            <hr>
            <form action="{{route('manage_size_process')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="size" class="control-label mb-1">Size</label>
                    <input id="size" value="{{$size}}" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                </div>
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