@extends('front/layout')

@section('container')
@section('page_title','Product details')
<section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><img width="200px" a data-lens-image="{{asset('storage/media/'.$product[0]->image)}}" class="simpleLens-lens-image"><img src="{{asset('storage/media/'.$product[0]->image)}}" class="simpleLens-big-image"></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{$product[0]->name}}</h3>
                    <div class="aa-price-block">
                        @if($product[0]->is_discounted==1)
                        <span class="aa-product-price">BDT {{$product[0]->discount_price}}</span><span class="aa-product-price">
                        <del>{{$product[0]->price}}</del>
                        @else
                        <span class="aa-product-price">BDT {{$product[0]->price}}</span>
                        @endif
                      @if($product[0]->s_qty==0)
                      @elseif($product[0]->m_qty==0)
                      @elseif($product[0]->l_qty==0)
                      @elseif($product[0]->xl_qty==0)
                       <p class="aa-product-avilability">Avilability: <span>Out of stock</span></p>
                      @else
                       <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                      @endif
                    </div>
                    <p class="aa-product-description">Details: {{$product[0]->description}}</p>
                    <h4>Available Size</h4>
                    <div class="aa-prod-view-size">
                          @if($product[0]->s_qty!=0)
                          <a href="#">S</a>
                          @endif
                          @if($product[0]->m_qty!=0)
                          <a href="#">M</a>
                          @endif
                          @if($product[0]->l_qty!=0)
                          <a href="#">L</a>
                          @endif
                          @if($product[0]->xl_qty!=0)
                          <a href="#">XL</a>
                          @endif
                    </div>
                      <p class="aa-prod-category">
                        Category: <a href="#">{{$products[0]->category_name}}</a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      @php
                       $pid=$product[0]->id;
                      @endphp
                      <form action="/add_to_cart" method="POST">
                          @csrf
                        <input type="hidden" name="product_id" value="{{$pid}}">
                        <button class="btn btn-primary">Add To Cart</a>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#review" data-toggle="tab">Reviews</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active " id="review">
                 <div class="aa-product-review-area">
                   <h4>Reviews for {{$product[0]->name}}</h4> 
                   <ul class="aa-review-nav">
                    @foreach($review as $listR)
                     <li>
                        <div class="media">
                          <div class="media-left">
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>{{$listR->name}}</strong> - <span>{{\carbon\carbon::parse($listR->created_at)->format('d-m-y')}}</span></h4>
                            <p>{{$listR->review}}</p>
                          </div>
                        </div>
                      </li>
                      @endforeach
                   </ul>
                   @if(session()->has('CUSTOMER_LOGIN'))
                   <h4>Add a review</h4>
                   <!-- review form -->
                   <form action="/add_review" method="POST" >
                    @csrf
                      <div class="form-group">
                        <label for="review" class="control-label mb-1">Your Review</label>
                        <textarea id="review" value="" name="review" type="text" class="form-control" aria-required="true" aria-invalid="false" required></textarea>
                      </div>
                      <input type="hidden" name="product_id" value="{{$pid}}">  
                      <button class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                   @endif
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
  <!-- / product category -->

@endsection
