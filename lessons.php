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
                                <div class="logo"> <a href="index.php"><img src="images/logo.jpg" alt="logo" /></a> </div>
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
                            update_user_lessons($userid, $lId, '', 10, 0, 0);
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
                    <div class="col-md-12 title">
                        <div class="goal-div">
                            Goal: <span id="goal">00:00</span>
                            / <?php echo $user[5]." mins"; ?>
                        </div>
                        <div>
                            <button onclick="startTimer()">Start</button>
                            <button onclick="stopTimer()">Stop</button>
                        </div>
                    </div>
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
                <button class="btn-normal" id="btncertf">Certificate</button>
            </div>

            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <html>

                    <head>
                        <style type='text/css'>
                            .modal {
                                display: none;
                                position: fixed;
                                z-index: 1;
                                padding-top: 50px;
                                left: 0;
                                top: 0;
                                width: 100%;
                                height: 100%;
                                overflow: auto;
                                background-color: rgb(0, 0, 0);
                                background-color: rgba(0, 0, 0, 0.4);
                            }

                            /* Modal Content */
                            .modal-content {
                                background-color: #fefefe;
                                padding: 20px;
                                border: 1px solid #888;
                                width: 80%;
                                margin-left: 100px;
                            }

                            /* The Close Button */
                            .close {
                                color: #aaaaaa;
                                float: right;
                                font-size: 28px;
                                font-weight: bold;
                            }

                            .close:hover,
                            .close:focus {
                                color: #000;
                                text-decoration: none;
                                cursor: pointer;
                            }

                            .container1 {
                                border: 10px solid gray;
                                width: 800px;
                                height: 580px;
                                display: table-cell;
                                vertical-align: middle;
                                border-radius: 10px;
                                margin-left: 15%;
                                background-color: white;
                            }

                            .logo {
                                color: tan;
                            }

                            .marquee {
                                color: darkblue;
                                font-size: 48px;
                                margin: 20px;
                            }

                            .assignment {
                                margin: 20px;
                            }

                            .person {
                                border-bottom: 2px solid black;
                                font-size: 32px;
                                font-style: italic;
                                margin: 20px auto;
                                width: 300px;
                            }

                            .reason {
                                margin: 20px;
                            }

                        </style>
                    </head>

                    <body>
                        <div class="container1" id="certificateContent">
                            <br>
                            <div class="logo">
                                <img src="images/logo.jpg" alt="logo" />
                            </div>

                            <div class="marquee">
                                <br>
                                Certificate of Completion
                            </div>

                            <div class="assignment">
                                Congratulations, <b>John Doe</b>
                            </div>

                            <div class="person">
                                Web Development
                            </div>

                            <div class="reason">
                                Course completed on Apr 30, 2021<br />
                                2 hours 30 minutes
                                <br> <br>
                                By continuing to learn you have expanded your perspective,<br>
                                sharpened your skills, and made yourself even more in demand.
                            </div>
                            <div class="reason">
                                <br>
                                Cetificate Id: Ack67JKLnn8923z
                            </div>
                        </div>
                        <br>
                        <button id="downloadCertf" style="background-color: #fefefe;">Download Certificate</button>
                    </body>

                    </html>
                </div>

            </div>

            <?php 
            }
            ?>
            <br>
        </div>
    </div>

    <div>
        <!-- <div id="stopwatch">
            00:00:00
        </div>
        <ul id="buttons">
            <li><button onclick="startTimer()">Start</button></li>
            <li><button onclick="stopTimer()">Stop</button></li>

            <li><button onclick="resetTimer()">Reset</button></li>
        </ul> -->
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
            //informGoal();

            startTimer();
            var myVar = setInterval(() => {
                post_to_update_user_actual_goal(current);
            }, 1000 * 10);
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

        function informGoal() {
            alert("Your learning goal: " + <?php echo $user[5]; ?> + " mins");
        }

        //const timer = document.getElementById('stopwatch');
        var currentGoal = <?php echo $user[6]; ?>;
        var current = currentGoal;
        const goal = document.getElementById('goal');

        var min = (currentGoal == '' || currentGoal == null ? 0 : currentGoal);
        var sec = 0;
        var stoptime = true;

        function startTimer() {
            if (stoptime == true) {
                stoptime = false;
                timerCycle();
            }
        }

        function stopTimer() {
            if (stoptime == false) {
                stoptime = true;
            }
        }

        function timerCycle() {
            if (stoptime == false) {
                sec = parseInt(sec);
                min = parseInt(min);

                sec = sec + 1;

                if (sec == 60) {
                    min = min + 1;
                    current = current + 1;
                    sec = 0;
                }

                if (sec < 10 || sec == 0) {
                    sec = '0' + sec;
                }
                if (min < 10 || min == 0) {
                    min = '0' + min;
                }

                goal.innerHTML = min + ':' + sec;

                setTimeout("timerCycle()", 1000);
            }
        }

        var myVar;

        function mystart() {
            myVar = setInterval(function() {
                alert("First param");
            }, 5000);
        }

        function post_to_update_user_actual_goal(current) {
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "includes/counttime.php", true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Response
                    var response = this.responseText;
                }
            };
            var data = {
                userid: <?php echo $user[0]; ?>,
                actual: current
            };
            xhttp.send(JSON.stringify(data));
        }

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script>
        var modal = document.getElementById("myModal");

        var btn = document.getElementById("btncertf");

        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        html2canvas(document.querySelector("#certificateContent")).then(canvas => {
            document.body.appendChild(canvas)
        });

        $('#downloadCertf').click(function() {
            var pdf = new jsPDF('p', 'pt', 'letter');
            pdf.addHTML($('#certificateContent')[0], function() {
                pdf.save('Certificate.pdf');
            });
        });

    </script>
</body>

</html>
