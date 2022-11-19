<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>SIMPRO LANDING</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('') }}assets/images/fevicon.png" type="image/gif">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ asset('') }}assets/images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div  class="head_top">
            <div class="header">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                           <div class="center-desk">
                              <div class="logo">
                                 <a href="#home"><img src="{{ asset('') }}assets/images/logo.png" alt="#" /></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item">
                                    <a class="nav-link" href="#home"> Home</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#about">About</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#contact">Contact us</a>
                                 </li>
                              </ul>
                              <div class="sign_btn"><a href="/login/index">Log In</a></div>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end header inner -->
            <!-- end header -->
            <!-- banner -->
            <section class="banner_main">
               <div class="container-fluid">
                  <div class="row d_flex">
                     <div class="col-md-5">
                        <div class="text-bg">
                           <h1>Manajemen <br> Proyek </h1>
                           <strong>PT Tekno Mandala Kreatif</strong>
                           <span>Intive Studio</span>
                           <!-- <a href="#">Buy Now</a> -->
                        </div>
                     </div>
                     <div class="col-md-7 padding_right1">
                        <div class="text-img">
                           <figure><img src="{{ asset('') }}assets/images/office2.png" alt="#"/></figure>
                           <h3> : ) </h3>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </header>
      <!-- end banner -->
      <!-- about -->
      <div id="about" class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>About Intive Studio</h2>
                     <span>" Your Digital Movement Solution "</span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-8 offset-md-2 ">
                  <div class="about_box">
                     <a class="read_more" href="https://intivestudio.com/">Read more</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about -->
      <!-- best -->
      <div id="" class="best">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Build With Best </h2>
                     <span>"We are passionate to deliver every digital solution for your business to thrive in the 4.0 era"</span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="best_box">
                     <h4>Virtual Event</h4>
                     <p>Create awesome virtual events as you wish</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="best_box">
                     <h4>Webstie</h4>
                     <p>Website creation with the latest technology choices</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="best_box">
                     <h4>Mobile Apps</h4>
                     <p>Mobile application with a combination of aesthetic design</p>
                  </div>
               </div>
               <div class="col-md-12">
                  <a class="read_more" href="#">UP</a>
               </div>
            </div>
         </div>
      </div>
      <!-- end best -->
      <!-- request -->
      <div id="contact" class="request">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Request a Call back</h2>
                     <span>contact us via whatsapp by pressing the send button</span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <div class="black_bg">
                     <div class="row">
                        <div class="col-md-7 ">
                           <form class="main_form">
                              <div class="row">
                                 <div class="col-md-12 ">
                                    <input class="contactus" placeholder="Nmae" type="text" name="Nmae">
                                 </div>
                                 <div class="col-md-12">
                                    <input class="contactus" placeholder="Phone number" type="text" name=" Phone number">
                                 </div>
                                 <div class="col-md-12">
                                    <input class="contactus" placeholder="Email" type="text" name="Email">
                                 </div>
                                 <div class="col-md-12">
                                    <textarea class="textarea" placeholder="Message" type="text" name="Message "> Message </textarea>
                                 </div>
                              </div>
                           </form>
                           <div class="col-sm-12">
                                 <a href="https://api.whatsapp.com/send?phone=6289676480239">
                                 <center><button class="btn btn-dark">Send</button></center>
                                 </a>
                            </div>
                        </div>
                        <div class="col-md-5">
                           <div class="mane_img">
                              <figure><img src="{{ asset('') }}assets/images/mane_img.jpg" alt="#"/></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end request -->
      <!-- two_box section -->
      <!-- end two_box section -->
      <!-- testimonial -->
      <!-- end testimonial -->
      <!--  footer -->
      <footer>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2022 All Rights Reserved</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/js/popper.min.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('assets/js/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('assets/js/custom.js') }}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>

