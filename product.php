<?php
// Start the session
session_start();

// Check user login info
if (!isset($_SESSION['loggedin']) || $_SESSION["loggedin"] === false) {
   header("Location:index.php");
} else {
   $userId = $_SESSION["uid"];
}

include_once("includes/functions.inc.php");

include_once("includes/dbPDO.php");

//update_user_lessons(1, 1, 'detail', 10, 10, 12);


/* $courses_id = 30;
$lessons = get_lessons_by_course_id($courses_id); */


//echo "asdasdas";
//print_r($lessons);

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
   <body class="main-layout product_page">
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
                              <li > <a href="index.php">Home</a> </li>
                              <li> <a href="about.php">About</a> </li>
                              <?php 
                                 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                                    echo "<li class='active'> <a href='product.php'>Courses</a> </li>";
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
                        <h2>Our Courses</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>
      <!-- our product -->
      <div class="product">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <span>Available categories and topics: </span>
                     <br>
                  </div>
               </div>
            </div>            
         </div>
      </div>
      
      <div class="container">
         <div class="wrapper">

         <?php 
         $categories = get_all_categories();
         if($categories) {

            foreach($categories as $cId => $cat) {

         ?>
            <div class="accordion">
               <div class="accordion_tab">
                  <?php echo $cat['name']; ?>
                  <div class="accordion_arrow">
                     <img src="https://i.imgur.com/PJRz0Fc.png" alt="arrow">
                  </div>
               </div>
               <div class="accordion_content">
               <?php 
                  $topics = get_topics_by_category_id($cId);
                  if($topics) {
                     foreach($topics as $tId => $top) {
                     
               ?>
               
                  <div class="accordion_item">
                  <p class="item_title"><?php echo "<a href='product-detail.php?tId=".$tId."'>".$top['name']."</a>"; ?></p>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto quis sed praesentium dolorem hic ipsam maiores magnam voluptatem deleniti sunt.</p>
                  </div>
                  <?php 
                     }
                  } else {
                     echo "No item in this category";
                  }
                  
                  ?>
               </div>
            </div>
         <?php
            
            }
         }
         
         ?>
         </div>
      </div>
      

      <div class="product">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <span>Lessons you are attending: </span>
                     <br>
                  </div>
               </div>
            </div>            
         </div>
      </div>

      <div class="container">
         <div class="wrapper">
            <div class="col-md-12 lessons-attending">
            <?php
            
               $users = get_lessons_by_user_id($userId);
               
               if($users) {
                  foreach($users as $user) {
                     $lesson = get_lesson_by_id($user[1]);
                     echo "<a href='lessons.php?lId=".$user[1]."'>".$lesson[1]."</a><br>";
                  }
               } else {
                  echo "No lessons found";
               }
            ?>
            </div>
         </div>

      </div>
         
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
                    <li> <a href="#"> Data recovery</a></li>
                         <li> <a href="#">Computer repair</a></li>
                         <li> <a href="#">Mobile service</a></li>
                         <li> <a href="#">Network solutions</a></li>
                          <li> <a href="#">Technical support</a></li>
                  </div>
               </div>
                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>ABOUT EASYLEARN</h3>
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

         $(".accordion_tab").click(function(){
            $(".accordion_tab").each(function(){
               $(this).parent().removeClass("active");
               $(this).removeClass("active");
            });
         $(this).parent().addClass("active");
         $(this).addClass("active");
      });

         /* var t;
         setInterval(function(){ 
            var goalset = parseInt($("#goalset").val());
            t = goalset+1;

            console.log(goalset);
            console.log(t);
            goalset.innerHTML = t;
            }, 1000); */

         function loadDoc() {
         var xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               document.getElementById("demo").innerHTML = this.responseText;
            }
         };
         xhttp.open("POST", "includes/counttime.php", true);
         xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xhttp.send("realgoal="+"4"+"&uid="+<?php echo $userId; ?>);
         }

         
      </script> 
   </body>
</html>