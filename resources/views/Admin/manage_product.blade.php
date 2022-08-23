@extends('admin/layout')
@section('product_select','active')
@section('page_title','Update Product')
@section('container')
  @if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
     {{session('message')}}
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	 </button>
    </div>
   @endif
    @if($id>0)
      {{$image_required = ""}}
    @else
      {{$image_required = "required"}}
    @endif
<div class="col-lg-12">
    <form action="{{route('manage_product_process')}}" method="post" enctype="multipart/form-data">
        <div class="card" id="pab" >
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Update Product</h3>
                </div>
                <hr>
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">Product Name</label>
                        <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="product_slug" class="control-label mb-1">Product Slug</label>
                        <input id="product_slug" value="{{$product_slug}}" name="product_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="category_id" class="control-label mb-1">Category</label>
                                <select id="category_id" value="{{$category_id}}" name="category_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    <option value="">Select Category</option>
                                    @foreach($category as $list)
                                    @if($category_id==$list->id)
                                    <option selected value="{{$list->id}}">
                                    @else
                                    <option value="{{$list->id}}">
                                    @endif
                                    {{$list->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                              <label for="price" class="control-label mb-1">Price</label>
                              <input id="price" value="{{$price}}" name="price" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="col-md-4">
                              <label for="discount_price" class="control-label mb-1">Discount_price</label>
                              <input id="discount_price" value="{{$discount_price}}" name="discount_price" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                              <label for="s_qty" class="control-label mb-1">S_Size_Quantity</label>
                              <input id="s_qty" value="{{$s_qty}}" name="s_qty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="col-md-3">
                              <label for="m_qty" class="control-label mb-1">M_Size_Quantity</label>
                              <input id="m_qty" value="{{$m_qty}}" name="m_qty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="col-md-3">
                              <label for="l_qty" class="control-label mb-1">L_Size_Quantity</label>
                              <input id="l_qty" value="{{$l_qty}}" name="l_qty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="col-md-3">
                              <label for="xl_qty" class="control-label mb-1">XL_Size_Quantity</label>
                              <input id="xl_qty" value="{{$xl_qty}}" name="xl_qty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label mb-1">Description</label>
                        <textarea id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="keywords" class="control-label mb-1">Keywords</label>
                        <textarea id="keywords" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$keywords}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image" class="control-label mb-1">Image</label>
                        <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" {{$image_required}}>
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