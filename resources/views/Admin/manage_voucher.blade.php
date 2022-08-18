@extends('admin/layout')
@section('voucher_select','active')
@section('page_title','Update Voucher')
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
                <h3 class="text-center title-2">Update Voucher</h3>
            </div>
            <hr>
            <form action="{{route('manage_voucher_process')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title" class="control-label mb-1">Title</label>
                    <input id="title" value="{{$title}}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                </div>
                <div class="form-group">
                    <label for="code" class="control-label mb-1">Code</label>
                    <input id="code" value="{{$code}}" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                </div>
                <div class="form-group">
                    <label for="value" class="control-label mb-1">value</label>
                    <input id="value" value="{{$value}}" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                </div>
                <div class="form-group">
                    <label for="min_order_amount" class="control-label mb-1">Min order amount</label>
                    <input id="min_order_amount" value="{{$min_order_amount}}" name="min_order_amount" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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