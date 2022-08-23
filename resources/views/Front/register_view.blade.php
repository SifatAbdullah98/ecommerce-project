<!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-12">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                  <form action="{{route('register')}}" method="post" class="aa-login-form" id="reg_form">
                  @csrf 
                  <div class="form-group">
                    <label for="name" class="control-label mb-1">Name</label>
                    <input id="name" value="" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                  <div class="form-group">
                    <label for="email" class="control-label mb-1">E-Mail</label>
                    <input id="email" value="" name="email" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                  <div class="form-group">
                    <label for="phone" class="control-label mb-1">Phone</label>
                    <input id="phone" value="" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                  <div class="form-group">
                    <label for="password" class="control-label mb-1">Password</label>
                    <input id="password" value="" name="password" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                    <!--<label for="">Name<span>*</span></label>
                    <input type="text"  id="name" name="name" placeholder="Name" required>

                    <label for="">Email<span>*</span></label>
                    <input type="email"  id="email" name="email" placeholder="Email" required>

                    <label for="">Phone<span>*</span></label>
                    <input type="text"  id="phone" name="phone" placeholder="Phone" required>

                    <label for="">Password<span>*</span></label>
                    <input type="password"  id="password" name="password" placeholder="Password" required>-->

                    <button type="submit" class="aa-browse-btn" id="register">Register</button>                   
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

