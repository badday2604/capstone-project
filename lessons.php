<?php
// Start the session
session_start();

include("includes/functions.inc.php");
include("includes/dbPDO.php");

if(isset($_SESSION["uid"])) {
    $userid = $_SESSION["uid"];
} else {
    header("Location: login.php");
}

$user = get_user_by_user_id($userid);

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
                        <h2>Lesson Detail</h2>
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
                        <span>
                        <?php 
                        if(isset($_GET['lId'])) {
                            $lId = $_GET['lId'];
                            $tutorials = get_tutorials_by_lesson_id($lId);
                            if($tutorials) {
                                echo "There are ".count($tutorials)." tutorials for this lesson:";
                            }
                            /* $topic = get_topic_by_id($tId);
                            
                            foreach($topic as $tId => $top) {
                                echo $top['name'];
                            } */
                        } else {
                            echo "No lesson selected";
                        }
                        
                        ?>
                        </span>
                        <br>
                    </div>
                    <div class="col-md-12 title"><span id="goal">Goal: <?php echo $user[5]; ?></span></div>
                </div>
            </div>            
        </div>
    </div>

    <div class="about">
        <div class="container">
      <?php 
        if($tutorials) {
            foreach($tutorials as $id => $tu) {
            echo "<div class='row'>";
            echo "<div class='col-xl-8 col-lg-8 col-md-12 col-sm-12'>";
            echo "<div class='about_box'>";
            echo "<iframe type='text/html' width='640' height='360' src='".$tu['url']."' frameborder='0' ></iframe>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
            echo "<div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>";
            echo "<div class='about_box'>";
            echo "<h2>".$tu['name']."</h2>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            echo "<br>";
            }
        ?>
        <br><br>
            <div class="row">
                <button class="btn-normal" onclick="goBack()">Return</button>
                <button class="btn-normal" onclick="taketest()">Take a Test</button>
            </div>
            <?php 
            }
            ?>
            <br>
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
                     <h3>IT NEXT THEME</h3>
                     <span>Tincidunt elit magnis <br>
                     nulla facilisis. Dolor <br>
                  sagittis maecenas. <br>
               Sapien nunc amet <br>
            ultrices, </span>
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

        function goBack() {
            window.history.back();
        }

        function taketest() {
            var r = confirm("You want to take the test without finishing the lesson?");
            if (r == true) {
                window.location.href = "tests.php?lId=<?php echo $lId; ?>";
            }
        }

        function currentGoal() {
            var userGoal = <?php echo $user[5]; ?>;
            alert(userGoal);
        }
         
      </script> 
   </body>
</html>