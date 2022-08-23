@extends('front/layout')
@section('container')
<section id="aa-slider">
   <div class="aa-slider-area">
      <div id="sequence" class="seq">
         <div class="seq-screen">
            <ul class="seq-canvas">
               <!-- single slide item -->
               <li>
                  <div class="seq-model">
                     <img data-seq src="{{asset('front_assets/img/slider/11.jpg')}}" alt="Men slide img" />
                  </div>
               </li>
               <!-- single slide item -->
               <li>
                  <div class="seq-model">
                     <img data-seq src="{{asset('front_assets/img/slider/22.jpg')}}" alt="Wristwatch slide img" />
                  </div>
               </li>
               <!-- single slide item -->
               <li>
                  <div class="seq-model">
                     <img data-seq src="{{asset('front_assets/img/slider/33.jpg')}}" alt="Women Jeans slide img" />
                  </div>
               </li>
            </ul>
         </div>
         <!-- slider navigation btn -->
         <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
            <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
            <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
         </fieldset>
      </div>
   </div>
</section>
<!-- / slider -->
<!-- Start Promo section -->
<section id="aa-promo">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="aa-promo-area">
               <div class="row">
                  <div class="col-md-6 ten-padding">
                     <div class="aa-promo-left">
                        <div class="aa-promo-banner">
                           <img width="800px" img src="{{asset('front_assets/img/Capture.png')}}" alt="img">                      
                           <div class="aa-prom-content">
                              <h4><a href="{{url('category/@man2022')}}">Men</a></h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 ten-padding">
                     <div class="aa-promo-right">
                        <div class="aa-promo-banner">
                           <img width="800px" img src="{{asset('front_assets/img/268013169_1714185648790853_6991509318092666922_n.jpg')}}" alt="img">                      
                           <div class="aa-prom-content">
                              <h4><a href="{{url('category/@woman2022')}}">Women</a></h4>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
<!-- / Promo section -->
<!-- Products section -->
<section id="aa-product">
   <div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="row">
            <div class="aa-product-area">
               <div class="aa-product-inner">
                  <!-- start prduct navigation -->
                  <ul class="nav nav-tabs aa-products-tab">
                  <!--@foreach($home_cat as $list)
                  <li class=""><a href="cat{{$list->id}}" data-toggle="tab">{{$list->category_name}}</a></li>
                  @endforeach-->
                  @foreach($home_cat as $list)
                  @php
                  $count=1;
                  @endphp
                  @php
                  $cat_class="";
                  if($count==1){
                  $cat_class="in active";
                  $count++;
                  }
                  @endphp 
                  <!--<div class="tab-pane fade {{$cat_class}}" id="cat{{$list->id}}">
                     <ul class="aa-product-catg">
                        @foreach($home_cat_product[$list->id] as $productArr)
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
                  </div>-->
                  @endforeach 
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- / Products section -->
<!-- popular section -->
<section id="aa-popular-category">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="aa-popular-category-area">
                  <ul class="nav nav-tabs aa-products-tab">
                     <li><a href="#popular" data-toggle="tab">Popular</a></li>
                     <li><a href="#featured" data-toggle="tab">Featured</a></li>
                     <li><a href="#sale" data-toggle="tab">ON Sale!</a></li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane fade in active" id="popular">
                        <ul class="aa-product-catg aa-popular-slider">
                           @foreach($home_popular_product[$list->id] as $productArr)                   
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
                     <!-- / popular product category -->
                     <!-- start featured product category -->
                     <div class="tab-pane fade" id="featured">
                        <ul class="aa-product-catg aa-featured-slider">
                           @foreach($home_featured_product[$list->id] as $productArr)                   
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
                     <!-- / featured product category -->
                     <!-- start sale product category -->
                     <div class="tab-pane fade" id="sale">
                        <ul class="aa-product-catg aa-sale-slider">
                           @foreach($home_discounted_product[$list->id] as $productArr)                   
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
                     <!-- / latest product category -->              
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- / popular section -->
<!-- Support section -->
<section id="aa-support">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="aa-support-area">
               <!-- single support -->
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="aa-support-single">
                     <span class="fa fa-truck"></span>
                     <h4>FREE SHIPPING</h4>
                     <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                  </div>
               </div>
               <!-- single support -->
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="aa-support-single">
                     <span class="fa fa-clock-o"></span>
                     <h4>30 DAYS MONEY BACK</h4>
                     <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                  </div>
               </div>
               <!-- single support -->
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="aa-support-single">
                     <span class="fa fa-phone"></span>
                     <h4>SUPPORT 24/7</h4>
                     <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- / Support section -->
@endsection