@extends('front/layout')
@section('container')
@section('page_title','Checkout')

 
<!-- Cart view section -->
<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                       $total=0;
                      @endphp
                      @foreach($product as $list)
                      <tr>
                        <td><a href="#"><img src="{{asset('storage/media/'.$list->image)}}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">{{$list->name}}</a></td>
                        <td>{{$list->price}}</td>
                        @php
                        $total+=$list->price;
                        @endphp
                        @endforeach
                      </tr>
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Add Voucher">
                            <input class="aa-cart-view-btn" type="submit" value="Apply">
                          </div>
                          <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>{{$total}}</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>{{$total}}</td>
                   </tr>
                 </tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-12">
                <div class="aa-myaccount-register">                 
                 <h4>Shipping details</h4>
                  <form action="{{route('order_now')}}" method="POST" class="aa-login-form">
                  @csrf 
                  <div class="form-group">
                    <label for="division" class="control-label mb-1">Phone</label>
                    <input id="division" value="" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                  <div class="form-group">
                    <label for="division" class="control-label mb-1">Division</label>
                    <input id="division" value="" name="division" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                  <div class="form-group">
                    <label for="district" class="control-label mb-1">District</label>
                    <input id="district" value="" name="district" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                  <div class="form-group">
                    <label for="area" class="control-label mb-1">Area</label>
                    <input id="area" value="" name="area" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                  <div class="form-group">
                    <label for="details_address" class="control-label mb-1">Details Address</label>
                    <textarea id="details_address" value="" name="details_address" type="text" class="form-control" aria-required="true" aria-invalid="false" required></textarea>
                  </div>
                   <button type="submit" class="aa-browse-btn" id="submit">Place Order</button>                   
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
 


@endsection
