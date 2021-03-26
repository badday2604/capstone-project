<?php
session_start();

// Need the database connection:
require('includes/mysqli_connect.php');
require('includes/functions.inc.php');

//define variable and set empty values
$uid = $firstname = $lastname = $email = $phone = $pwd = $pwdrepeat = $cardno = "";
$uidErr = $fnErr = $lnErr = $emailErr = $phoneErr = $pwdErr = $pwdrepeatErr = $cardnoErr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process payment
	$errors = [];

    // Validate username
    if(empty($_POST['username'])) {
        $uidErr = "Username is required";
    } else {
        $uid = $_POST['username'];
    }
    // Validate email
    if(empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else {
        $email = sanitizeInput($_POST['email']);

        // check if email address is well-formated
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } 
    }
    // Validate first name
    if(empty($_POST['firstname'])) {
        $fnErr = "First Name is required";
    } else {
        $fn = sanitizeInput($_POST['firstname']);

        if (!preg_match("/^[a-zA-Z ]*$/", $fn)) {  
            $fnErr = "Only alphabets and white space are allowed";  
        }
    }
    // Validate last name
    if(empty($_POST['lastname'])) {
        $lnErr = "Last Name is required";
    } else {
        $ln = sanitizeInput($_POST['lastname']);

        if (!preg_match("/^[a-zA-Z ]*$/", $ln)) {  
            $lnErr = "Only alphabets and white space are allowed";  
        }
    }
    // Validate phone
    if(empty($_POST['phone'])) {
        $phoneErr = "Phone Number is required";
    } else {
        $phone = sanitizeInput($_POST['phone']);

        if (!preg_match("/^[0-9]*$/", $phone) ) {  
            $phoneErr = "Only numeric value is allowed.";
        }
    }
    // Validate password
    if(empty($_POST['pwd'])) {
        $pwdErr = "Password is required";
    } else {
        if(empty($_POST['pwdrepeat'])) {
            $pwdrepeatErr = "Password Repeat is required";
        } else {
            if(checkValidPwd($pwd, $pwdrepeat) !== false) {
                $pwdErr = "Password does not meet requirement"; 
            } else {
                $pwd = $_POST['pwd'];
            }
        }
    }
    
    // Validate card number
    if(empty($_POST['cardno'])) {
        $cardnoErr = "Card Number is required";
    } else {
        $cardno = sanitizeInput($_POST['cardno']);

        if (!preg_match("/^[0-9]*$/", $cardno) ) {  
            $cardnoErr = "Only numeric value is allowed.";  
        }
    }

    $uType = 2;

    if(empty($uidErr) && empty($fnErr) && empty($lnErr) && empty($emailErr) && empty($phoneErr) && empty($pwdErr) && empty($pwdrepeatErr) && empty($cardnoErr)) {
        $sql = "INSERT INTO users
        (username, password, type, first_name, last_name, email, phone, card_no)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        if($stmt = mysqli_prepare($dbc, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssisssss", $uid, $pwd, $uType, $fn, $ln, $email, $phone, $cardno);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $_SESSION["registered"] = true;
                // Redirect to login page
                header("Location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Close connection
    mysqli_close($dbc);
}
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

    <style type="text/css">
        .error {
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
                                    <li> <a href="https://www.facebook.com/"><i class="fa fa-facebook-f"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="top-box">
                                <p>All our dreams can come true, if we have the courage to pursue them - Walt Disney</p>
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
                                <div class="logo"> <a href="index.html"><img src="images/logo.jpg" alt="logo" /></a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li> <a href="index.php">Home</a> </li>
                                        <li> <a href="about.php">About</a> </li>
                                        <li> <a href="product.php">Courses</a> </li>
                                        <li> <a href="tests.php"> Tests</a> </li>
                                        <li> <a href="contact.php">Contact</a> </li>
                                        <li class="mean-last"> <a href="signup.php">signup</a> </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <li><a class="buy" href="login.php">Login</a></li>
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
                        <h2>Sign Up</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="signup-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                    <span class="error"><?php echo $uidErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="firstname">First name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>">
                    <span class="error"><?php echo $fnErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="lastname">Last name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>">
                    <span class="error"><?php echo $lnErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                    <span class="error"><?php echo $phoneErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" value="<?php if(isset($_POST['pwd'])) echo $_POST['pwd']; ?>">
                    <span class="error"><?php echo $pwdErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="pwdrepeat">Confirm Password</label>
                    <input type="password" class="form-control" id="pwdrepeat" name="pwdrepeat" value="<?php if(isset($_POST['pwdrepeat'])) echo $_POST['pwdrepeat']; ?>">
                    <span class="error"><?php echo $pwdrepeatErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="cardno">Card Number</label>
                    <input type="text" class="form-control" id="cardno" name="cardno" value="<?php if(isset($_POST['cardno'])) echo $_POST['cardno']; ?>">
                    <span class="error"><?php echo $cardnoErr; ?></span>
                </div>

                <button type="submit" name="submit">Sign Up</button>
                <br />
                <br />
            </form>
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
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });

    </script>
</body>

</html>
