@extends('front/layout')

@section('container')


 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-12">
                <div class="aa-myaccount-register">                 
                 <h4>Login</h4>
                  <form action="{{route('login')}}" method="post" class="aa-login-form" id="reg_form">
                  @csrf 
                  <div class="form-group">
                    <label for="email" class="control-label mb-1">Email</label>
                    <input id="email" value="" name="email" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                  <div class="form-group">
                    <label for="password" class="control-label mb-1">Password</label>
                    <input id="password" value="" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                  <!--<div class="form-group">
                    <label for="title" class="control-label mb-1">Title</label>
                    <input id="title" value="" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                  <div class="form-group">
                    <label for="title" class="control-label mb-1">Title</label>
                    <input id="title" value="" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                    <label for="">Name<span>*</span></label>
                    <input type="text"  id="name" name="name" placeholder="Name" required>

                    <label for="">Email<span>*</span></label>
                    <input type="email"  id="email" name="email" placeholder="Email" required>

                    <label for="">Phone<span>*</span></label>
                    <input type="text"  id="phone" name="phone" placeholder="Phone" required>

                    <label for="">Password<span>*</span></label>
                    <input type="password"  id="password" name="password" placeholder="Password" required>-->

                    <button type="login" class="aa-browse-btn" id="login">Login</button>                   
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
