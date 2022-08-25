@extends('front/layout')
@section('container')
@section('page_title','Product')
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
                           <figcaption>
                              <h4 class="aa-product-title"><a href="">{{$productArr->name}}</a></h4>
                              @if($productArr->is_discounted==1)
                                 <span class="aa-product-price">BDT {{$productArr->discount_price}}</span><span class="aa-product-price">
                                 <del>{{$productArr->price}}</del>
                              @else
                                 <span class="aa-product-price">BDT {{$productArr->price}}</span>
                              @endif
                              </span>
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
   </div>
</section>
@endsection