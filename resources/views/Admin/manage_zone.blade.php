@extends('admin/layout')
@section('product_select','active')
@section('page_title','Update Zone')
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
    <form action="{{route('manage_zone_process')}}" method="post" enctype="multipart/form-data">
        <div class="card" id="pab" >
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Update Zone</h3>
                </div>
                <hr>
                    @csrf
                    <div class="form-group">
                        <label for="title_zone" class="control-label mb-1">Zone Title</label>
                        <input id="title_zone" value="{{$title_zone}}" name="title_zone" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="district_id" class="control-label mb-1">District</label>
                                <select id="district_id" value="{{$district_id}}" name="district_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    <option value="">Select District</option>
                                    @foreach($district as $list)
                                    @if($district_id==$list->id)
                                    <option selected value="{{$list->id}}">
                                    @else
                                    <option value="{{$list->id}}">
                                    @endif
                                    {{$list->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                     </div>  
                   </div> 
                   </div>
                 </div>  
            <div>
          <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit</button>
        </div>
        <input type="hidden" name="id" value="{{$id}}"/>
    </form>
</div>
@endsection