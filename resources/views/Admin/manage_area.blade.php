@extends('admin/layout')
@section('area_select','active')
@section('page_title','Update Area')
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
    <form action="{{route('manage_area_process')}}" method="post" enctype="multipart/form-data">
        <div class="card" id="pab" >
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Update Area</h3>
                </div>
                <hr>
                    @csrf
                    <div class="form-group">
                        <label for="title_area" class="control-label mb-1">Area Title</label>
                        <input id="title_area" value="{{$title_area}}" name="title_area" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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
                            <div class="col-md-4">
                                <label for="zone_id" class="control-label mb-1">Zone</label>
                                <select id="zone_id" value="{{$zone_id}}" name="zone_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    <option value="">Select Zone</option>
                                    @foreach($zone as $list1)
                                    @if($zone_id==$list1->id)
                                    <option selected value="{{$list->id}}">
                                    @else
                                    <option value="{{$list->id}}">
                                    @endif
                                    {{$list1->title_zone}}</option>
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
<script>
    function select(){
        let district = document.getElementById("district_id").addEventListener("change", function(e) {e.preventDefault();
    let result = this.value;   
    // Simulating AJAX response    
        let db_result = [
        {"thana_name": "rampura"},        
        {"thana_name": "gulshan"},
        {"thana_name": "motizil"}    
    ];
        if (db_result.length > 0) {
        let thana_select = document.getElementById("thana");        
        thana_select.innerHTML = ""; // Clear existing options
                db_result.forEach(function(item, index) {
            let option = document.createElement("option");            
            option.value = item.thana_name;
            option.text = item.thana_name; // Modify this line if you need different display format            
            thana_select.appendChild(option);
        });       
        thana_select.style.display = "block";    }
});

    }
@endsection