<?php
// Start the session
session_start();

// Check user login info
/* if (!isset($_SESSION['login'])) {
   header("Location:index.php");
} else {
   
} */

//require("includes/mysqli_connect.php");

/* if($r) {
   while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
      echo $row['name']."<br/>";
   }
} */

include_once("includes/functions.inc.php");

?>

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
      <title>EasyLearn</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
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
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader --> 
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="head_top">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="top-box">
                        <ul class="sociel_link">
                           <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                           <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                           <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="top-box">
                        <p><?php echo "".get_random_quote().""; ?></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo"> <a href="index.php"><img src="images/logo.jpg" alt="logo"/></a> </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                           <ul class="menu-area-main">
                              <li class="active"> <a href="#">Home</a> </li>
                              <li> <a href="about.php">About</a> </li>
                              <?php 
                                 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                                    echo "<li> <a href='product.php'>Courses</a> </li>";
                                 }
                              ?>
                              <li> <a href="contact.php">Contact</a> </li>
                              <li class="mean-last">
                              <?php 
                                 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                                    echo "<a href='logout.php'>Logout</a>";
                                 } else {
                                    echo "<a href='signup.php'>signup</a>";
                                 }
                              ?>
                              </li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                  <li style="padding-top:25px">
                  <?php 
                     if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                        echo "<span class='welcome'><strong>Welcome</strong><span>";
                     } else {
                        echo "<a class='buy' href='login.php'>Login</a>";
                     }
                  ?>
                  </li>
               </div>
            </div>
         </div>
         <!-- end header inner --> 
      </header>
      <!-- end header -->
      <?php 
         if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
      ?>
      <section class="slider_section">
         <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">

            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="images/banner2.jpg" alt="First slide">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <h1>Our <br> <strong class="black_bold">Latest </strong><br>
                           <strong class="yellow_bold">Course </strong></h1>
                        <p>It is a long established fact that a r <br>
                          eader will be distracted by the readable content of a page </p>
                        <a  href="#">see more Courses</a>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <h1>Our <br> <strong class="black_bold">Latest </strong><br>
                           <strong class="yellow_bold">Course </strong></h1>
                        <p>It is a long established fact that a r <br>
                          eader will be distracted by the readable content of a page </p>
                        <a  href="#">see more Courses</a>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="third-slide" src="images/banner2.jpg" alt="Third slide">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <h1>Our <br> <strong class="black_bold">Latest </strong><br>
                           <strong class="yellow_bold">Course </strong></h1>
                        <p>It is a long established fact that a r <br>
                          eader will be distracted by the readable content of a page </p>
                        <a  href="#">see more Courses</a>
                     </div>
                  </div>
               </div>

            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class='fa fa-angle-right'></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class='fa fa-angle-left'></i>
            </a>
            
         </div>

      </section>


      <?php 
            }
      ?>


<!-- CHOOSE  -->
      <div class="whyschose">
         <div class="container">

            <div class="row">
               <div class="col-md-7 offset-md-3">
                  <div class="title">
                     <h2>Why <strong class="black">choose us</strong></h2>
                     <span>Best online learning service with best price!</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="choose_bg">
         <div class="container">
            <div class="white_bg">
            <div class="row">
               <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="for_box">
                     <i><img src="icon/1.png"/></i>
                     <h3>Comfort</h3>
                     <p>All lectures and needed materials are provided via online platforms, so you’ll easily access them from the comfort of your home</p>
                  </div>
               </dir>
               <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="for_box">
                     <i><img src="icon/2.png"/></i>
                     <h3>Lower Costs</h3>
                     <p>Online courses are more than useful for anyone who wants to learn from prestigious educators</p>
                  </div>
               </dir>
               <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="for_box">
                     <i><img src="icon/3.png"/></i>
                     <h3>Self-paced Learning</h3>
                     <p>You can access the materials at any time that works for you</p>
                  </div>
               </dir>
               <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="for_box">
                     <i><img src="icon/4.png"/></i>
                     <h3>Improve Technical Skills</h3>
                     <p>Ability to use new software suites, perform in-depth research online, and communicate effectively online in various formats such as discussion boards and teleconferencing</p>
                  </div>
               </dir>
               <div class="col-md-12">
                  <a class="read-more" href="about.php">Read More</a>
               </div>
            </div>
         </div>
       </div>
      </div>
<!-- end CHOOSE -->

      <!-- service --> 
      <div class="service">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="title">
                     <h2>Service <strong class="black">Process</strong></h2>
                     <span>Easy and effective way to get your knowledge</span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="service-box">
                     <i><img src="icon/service1.png"/></i>
                     <h3>Fast service</h3>
                     <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="service-box">
                     <i><img src="icon/service2.png"/></i>
                     <h3>Secure payments</h3>
                     <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="service-box">
                     <i><img src="icon/service3.png"/></i>
                     <h3>Expert team</h3>
                     <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="service-box">
                     <i><img src="icon/service4.png"/></i>
                     <h3>Affordable services</h3>
                     <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="service-box">
                     <i><img src="icon/service5.png"/></i>
                     <h3>90 Days warranty</h3>
                     <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="service-box">
                     <i><img src="icon/service6.png"/></i>
                     <h3>Award winning</h3>
                     <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end service -->

      <div class="product-bg">
         <div class="Clients_bg_white">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="title">
                        <h3>What Clients Say?</h3>
                     </div>
                  </div>
               </div>
               <div id="client_slider" class="carousel slide banner_Client" data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#client_slider" data-slide-to="0" class="active"></li>
                     <li data-target="#client_slider" data-slide-to="1"></li>
                     <li data-target="#client_slider" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="container">
                           <div class="carousel-caption text-bg">
                              <div class="img_bg">
                                 <i><img src="images/lllll.png"/><span>Jone Due<br><strong class="date">12/02/2019</strong></span></i>
                              </div>
                     
                  <p>You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am really satisfied with my first laptop service.<br>
                You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am </p>
                
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="carousel-caption text-bg">
                <div class="img_bg">
                  <i><img src="images/lllll.png"/><span>Jone Due<br><strong class="date">12/02/2019</strong></span></i>
                  
               </div>
                <p>You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am really satisfied with my first laptop service.<br>
                You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am </p>
                
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="carousel-caption text-bg">
                 <div class="img_bg">
                  <i><img src="images/lllll.png"/><span>Jone Due<br><strong class="date">12/02/2019</strong></span></i>
                  
               </div>
                <p>You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am really satisfied with my first laptop service.<br>
                You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am </p>
               
              </div>
            </div>
          </div>
        </div>
        
      </div>

            </div>
         </div>

         <div class="container">
            <div class="yellow_bg">
            <div class="row">
               <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                  <div class="yellow-box">
                     <h3>REQUEST A FREE QUOTE<i><img src="icon/calll.png"/></i></h3>
                     <p>Get answers and advice from people you want it from.</p>
                  </div>
               </div>
               <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                  <div class="yellow-box">
                     <a href="#">Get  Quote</a>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </div>

      <!-- end our product -->
      <!-- map -->
      <!-- <div class="container-fluid padi">
         <div class="map">
            <img src="images/mapimg.jpg" alt="img"/>
         </div>
      </div> -->
      <!-- end map --> 
      <!--  footer -->


      <footr>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 offset-md-3">
                     <ul class="sociel">
                         <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                         <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                         <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                         <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                     </ul>
                  </div>
            </div>
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>Contact Us</h3>
                     <span>123 Second Street Fifth Avenue,<br>
                        Kitchener, Ontario<br>
                        +519 123 4567</span>
                  </div>
               </div>
                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>ADDITIONAL LINKS</h3>
                     <ul class="lik">
                         <li> <a href="#">About us</a></li>
                         <li> <a href="#">Terms and conditions</a></li>
                         <li> <a href="#">Privacy policy</a></li>
                         <li> <a href="#">News</a></li>
                          <li> <a href="#">Contact us</a></li>
                     </ul>
                  </div>
               </div>
                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>service</h3>
                      <ul class="lik">
                        <li> <a href="#">Categories</a></li>
                        <li> <a href="#">Topics</a></li>
                        <li> <a href="#">Courses</a></li>
                        <li> <a href="#">Lessons</a></li>
                        <li> <a href="#">Tutorials</a></li>
                  </div>
               </div>
                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>About EasyLearn</h3>
                     <span>Online learning is the newest and most popular form of distance education today.We are proud to introduce to you.</span>
                  </div>
               </div>
            </div>
         </div>
            <div class="copyright">
               <p>Copyright 2021 All Right Reserved By <a href="index.php">EasyLearn</a></p>
            </div>
         
      </div>
      </footr>
      <!-- end footer -->
      <!-- Javascript files--> 
      <script src="js/jquery.min.js"></script> 
      <script src="js/popper.min.js"></script> 
      <script src="js/bootstrap.bundle.min.js"></script> 
      <script src="js/jquery-3.0.0.min.js"></script> 
      <script src="js/plugin.js"></script> 
      <!-- sidebar --> 
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
            $(".fancybox").fancybox({
               openEffect: "none",
               closeEffect: "none"
            });
            
            $(".zoom").hover(function(){
               $(this).addClass('transition');
            }, function(){
               $(this).removeClass('transition');
            });
         });
         
      </script> 
   </body>
</html>