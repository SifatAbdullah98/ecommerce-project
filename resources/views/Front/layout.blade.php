<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>e-commerce</title>
    
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
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body> 
  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
            <div class="aa-header-top-left">
              <div class="navbar-collapse collapse">
                  <!-- Left nav -->
                <ul class="nav navbar-nav">
                  <li><a href="{{url('/')}}">Home</a></li>
                  <li><a href="{{url('category/@man2022')}}">Men</a>
                  </li>
                  <li><a href="{{url('category/@woman2022')}}">Women</a>
                  </li>
                  <li><a href="{{url('category/@acc_2022')}}">Accessories</a>
                  </li>
                  <li><a href="{{url('category/@footwear2022')}}">Footwear</a></li>
                </ul>
              </div>
            </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <a href="{{url('login')}}" data-toggle="modal" data-toggle="tooltip" data-placement="bottom" title="Login"><span class="fal fa-user"></span></a>
                  <a href="#" data-toggle="tooltip" data-placement="bottom" title="Cart"><span class="fal fa-shopping-cart"></span></a>
                  <a href="#" data-toggle="tooltip" data-placement="bottom" title="Wishlist"><span class="fal fa-heart-o"></span></a>
                  </a>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- / menu -->
  <!-- Start slider -->
@section('container')
@show
  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Astor Pl, NY 10003, USA</p>
                      <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                      <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
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
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="{{url('registration')}}">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{asset('front_assets/js/bootstrap.js')}}"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.smartmenus.js')}}"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.smartmenus.bootstrap.js')}}"></script>  
  <!-- To Slider JS -->
  <script src="{{asset('front_assets/js/sequence.js')}}"></script>
  <script src="{{asset('front_assets/js/sequence-theme.modern-slide-in.js')}}"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.simpleLens.js')}}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{asset('front_assets/js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{asset('front_assets/js/nouislider.js')}}"></script>
  <!-- Custom js -->
  <script src="{{asset('front_assets/js/custom.js')}}"></script> 

  </body>
</html>