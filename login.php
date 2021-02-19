<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
 
        require('mysqli_connect.php');
        if(empty(trim($_POST["username"]))){
            $uname_err = "Please enter username!";
        } else{
            $uname = $_POST['username'];
            $un = mysqli_real_escape_string($dbc, trim($uname));
        }

        if(empty(trim($_POST["password"]))){
            $pass_err = "Please enter your password!";
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            padding: 20px;
            background-color: lightgoldenrodyellow;
        }

        .wrapper {
            width: 300px;
            padding: 20px;
        }

        .error {
            color: red;
        }

    </style>
</head>

<body>

    <div class="wrapper">
        <h2>Login</h2>
        <p><br>Please enter credentials to login <br></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username" class="form-control">
                <span class="error"><?php if (isset($uname_err)) echo $uname_err ?></span>
                <br>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="error"><?php if (isset($pass_err)) echo $pass_err ?></span>
                <br><br>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register_fn.php">Sign up</a></p>
        </form>
    </div>
</body>

</html>
