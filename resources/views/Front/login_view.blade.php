    <!-- Font awesome -->
    <link href="{{asset('front_assets/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('front_assets/css/bootstrap.css')}}" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{asset('front_assets/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/jquery.simpleLens.css')}}">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/slick.css')}}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/nouislider.css')}}">
    <!-- Theme color -->
    <link id="switcher" href="{{asset('front_assets/css/theme-color/default-theme.css')}}" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{asset('front_assets/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{asset('front_assets/css/style.css')}}" rel="stylesheet"> 
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
@section('page_title','Login')
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
                    <label for="phone" class="control-label mb-1">Phone</label>
                    <input id="phone" value="" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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
