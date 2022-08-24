@extends('front/layout')

@section('container')
@section('page_title','Cart')
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
                        <th>Remove</th>
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
                        <td><a class="remove" href="{{url('remove_from_cart/'.$list->cart_id)}}"><fa class="fa fa-close"></fa></a></td>
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
               <a href="{{url('checkout')}}" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

 
@endsection
