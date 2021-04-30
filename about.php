<?php
session_start();

include ("includes/functions.inc.php");

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
                         <li> <a href="https://www.facebook.com/"><i class="fa fa-facebook-f"></i></a></li>
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
                              <li> <a href="index.php">Home</a> </li>
                              <li class="active"> <a href="#">About</a> </li>
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
       <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>About Us</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>


<div class="about">
   <div class="container">
      <div class="row">
         <dir class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <div class="about_box">
               <figure><img src="images/pc_layout.png"/></figure>
            </div>
         </dir>
         <dir class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <div class="about_box">
               <h3>What is EasyLearn</h3>
               <p>Online learning is the newest and most popular form of distance education today. Within the past decade it has had a major impact on postsecondary education and the trend is only increasing</p>
            </div>
         </dir> 
      </div>
   </div>
</div>

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
                     <h2>service <strong class="black">process</strong></h2>
                     <span>Easy and effective way to study what you like and desire to learn.</span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="service-box">
                     <i><img src="icon/service1.png"/></i>
                     <h3>Correspondence Courses</h3>
                     <p>Conducted through regular mail with little interaction</p>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="service-box">
                     <i><img src="icon/service2.png"/></i>
                     <h3>Telecourses</h3>
                     <p>Where content is delivered via radio or television broadcast</p>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="service-box">
                     <i><img src="icon/service3.png"/></i>
                     <h3>CD-ROM Courses</h3>
                     <p>Where the student interacts with static computer content</p>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="service-box">
                     <i><img src="icon/service4.png"/></i>
                     <h3>Online Learning</h3>
                     <p>Internet-based courses offered synchronously and/or asynchronously</p>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="service-box">
                     <i><img src="icon/service5.png"/></i>
                     <h3>Mobile Learning</h3>
                     <p>By means of devices such as cellular phones, PDAs and digital audio players (iPods, MP3 players)</p>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="service-box">
                     <i><img src="icon/service6.png"/></i>
                     <h3>Award winning</h3>
                     <p>We are cooperate with professional tutors and professors to give you the best learning techniques</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end service -->

      
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