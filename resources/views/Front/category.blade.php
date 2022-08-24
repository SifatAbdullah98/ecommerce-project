@extends('front/layout')
@section('container')
@section('page_title','Category')
<section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-body">
              <ul class="nav nav-tabs aa-products-tab">
                @foreach($category as $hl)
                <li>
                  <figure>
                    <a class="aa-product-img" href="{{url('category_product/'.$hl->id)}}"><img width="200px" img src="{{asset('storage/media/category/'.$hl->category_image)}}" alt="polo shirt img"></a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="{{url('category/'.$hl->id)}}">{{$hl->category_name}}</a></h4>
                    </figcaption>
                  </figure>                     
                </li>  
                @endforeach
              </ul>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </section>
  <!-- / product category -->
  <!-- / Subscribe section -->
@endsection
