@extends('front/layout')
@section('container')
<section id="aa-popular-category">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="aa-popular-category-area">
               <div class="tab-content">
                     <div class="tab-pane fade in active" id="popular">
                        <ul class="aa-product-catg aa-popular-slider">
                     @foreach($product as $productArr)                   
                     <li>
                        <figure>
                           <a class="aa-product-img" href="{{url('product/'.$productArr->product_slug)}}"><img width="200px" img src="{{asset('storage/media/'.$productArr->image)}}" alt="polo shirt img"></a>
                           <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                           <figcaption>
                              <h4 class="aa-product-title"><a href="">{{$productArr->name}}</a></h4>
                              <span class="aa-product-price">BDT {{$productArr->price}}</span><span class="aa-product-price">
                              @if($productArr->is_discounted==1)
                              <del>{{$productArr->discount_price}}</del>
                              @endif
                              </span>
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
   </div>
</section>
@endsection