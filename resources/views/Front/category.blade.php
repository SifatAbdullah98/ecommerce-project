@extends('front/layout')

@section('container')

<!-- product category -->
<section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
               @foreach($product as $productArr)                   
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{url('product/'.$productArr->product_slug)}}"><img width="200px" img src="{{asset('storage/media/'.$productArr->image)}}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="">{{$productArr->name}}</a></h4>
                          <span class="aa-product-price">{{$productArr->price}}</span><span class="aa-product-price"><del>{{$productArr->discount_price}}</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>                            
                      </div>
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
