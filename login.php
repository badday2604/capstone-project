<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
 
        require('mysqli_connect.php');
        if(empty(trim($_POST["username"]))){
            $uname_err = "Please enter Username!";
        } else{
            $uname = $_POST['username'];
            $un = mysqli_real_escape_string($dbc, trim($uname));
        }

        if(empty(trim($_POST["password"]))){
            $pass_err = "Please enter Password!";
        } else{
            $pass = $_POST['password'];
            $p = mysqli_real_escape_string($dbc, trim($pass));
        }


        if(empty($uname_err) && empty($pass_err)){
            $q = "SELECT id FROM users WHERE username='$un' AND password='$p'";
            $r = @mysqli_query($dbc, $q);

            if (mysqli_num_rows($r) == 1) {

                $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
                header("Location: index.php");
                exit;

            } else {                
                echo 'Invalid Credentials';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            background-color: aliceblue;
        }

        .wrapper {
            width: 400px;
            height: 400px;
            padding: 20px;
            position: absolute;
            top: 25%;
            left: 35%;
        }

        .error {
            color: red;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header"><a style="color: darkblue; font-size: 24px; font-style: italic;" class="navbar-brand" href="#"><b>EasyLearn</b></a></div>
            <div style="float:right; position: absolute; top: 50%; margin-left:60%">
                Don't have an account? <a href="signup.php"><b>Sign up</b></a></div>
        </div>
    </nav>
    <div class="wrapper">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Login</b></div>
            <div class="panel-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div>
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <span class="error">
                            <?php if (isset($uname_err)) echo $uname_err ?>
                        </span>
                        <br><br>
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                        <span class="error">
                            <?php if (isset($pass_err)) echo $pass_err ?>
                        </span>
                        <br><br>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
