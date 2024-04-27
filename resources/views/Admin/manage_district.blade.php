@extends('admin/layout')
@section('district_select','active')
@section('page_title','Update District')
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
                <h3 class="text-center title-2">Update District</h3>
            </div>
            <hr>
            <form action="{{route('manage_district_process')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title" class="control-label mb-1">Title</label>
                    <input id="title" value="{{$title}}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                </div>
                <div class="form-group">
                    <label for="charge" class="control-label mb-1">Charge</label>
                    <input id="charge" value="{{$charge}}" name="charge" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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