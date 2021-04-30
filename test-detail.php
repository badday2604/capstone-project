<?php
session_start();


include("includes/functions.inc.php");
include("includes/dbPDO.php");

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
      <style>
         .correct {
            color: green;
         }
         .incorrect {
            color: red;
         }
      </style>
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
                              <li > <a href="index.php">Home</a> </li>
                              <li> <a href="about.php">About</a> </li>
                              <?php 
                                 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                                    echo "<li> <a href='product.php'>Courses</a> </li>";
                                    echo "<li class='active'> <a href='#'>Tests</a> </li>";
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
                        <h2>Tests Detail</h2>
                  </div>
               </div>
            </div>
      </div>
   </div>

   <!-- Lastestnews -->
   <div class="Lastestnews blog">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
         <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <?php 
                     
                     if(!isset($_GET['qId']) || !isset($_POST['qId'])) {
                        if(isset($_GET['qId'])) {
                           $quizId = $_GET['qId'];
                        } else {
                           $quizId = $_POST['qId'];
                        }
                        $questions = get_questions_by_quiz_id($quizId);
                        $answers = [];
                        $count = 0;
                        if($questions) {
                           foreach($questions as $qId => $ques) {
                              $desc = $ques['description'];
                              echo "<strong>".htmlentities($desc)."</strong><br>";

                              $questionId = $qId;
                              //echo $questionId;
                              
                              $answers = get_answers_by_question_id($questionId);
                              //print_r($answers);
                              if($answers) {
                                 foreach($answers as $aId => $answer) {
                                    $id = $aId;
                                    //echo $id."<br>";
                                    $answer_desc = $answer['answer'];
                                    $correct_answer = $answer['correct_answer'];
                                    
                                    echo "<div class='form-check'>";
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                       echo "<input class='form-check-input' type='radio' name='".$qId.$aId."' value='".$correct_answer."' ";
                                       if(isset($_POST[$qId.$aId])) echo "checked='checked'";
                                       echo " >";
                                       if(isset($_POST[$qId.$aId]) && $_POST[$qId.$aId] == '1') $count++;
                                       if($correct_answer == 1) {
                                          echo "<label class='form-check-label correct'>".htmlentities($answer_desc)."</label>";
                                       } else {
                                          echo "<label class='form-check-label incorrect'>".htmlentities($answer_desc)."</label>";
                                       }
                                    } else {
                                       echo "<input class='form-check-input' type='radio' name='".$qId.$aId."' value='".$correct_answer."' >";
                                       echo "<label class='form-check-label'>".htmlentities($answer_desc)."</label>";
                                    }
                                    echo "</div>";
                                    //echo "--".$answer_desc."-".$correct_answer."<br>";
                                 }
                              }

                              echo "<br>";
                           }
                           echo "Correct answers: ".$count."<br>";
                           echo "<input type='hidden' name='qId' value='".$quizId."'>";
                           echo "<input class='btn-small' type='submit' value='Submit'>";
                           echo "<input class='btn-small' type='button' value='Go Back' onclick='goBack()'>";
                        } else {
                           echo "There are no questions related to this lesson.";
                        }
                     } else {
                        echo "No quiz selected";
                     }
                     
                     ?>
                     
                     </div>
                  </div>
               </div>
            </div>
      </form>
   </div>
   <!-- end Lastestnews -->
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
                     <h3>conatct us</h3>
                     <span>123 Second Street Fifth Avenue,<br>
                       Manhattan, New York
                        +987 654 3210</span>
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
               <p>Copyright 2019 All Right Reserved By <a href="https://html.design/">Free html Templates</a></p>
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
         
      </script> 
   </body>
</html>