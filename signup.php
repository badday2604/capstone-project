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
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];        


        if(empty($uname_err) && empty($pass_err)){            
            $sql = "INSERT INTO users (first_name, last_name, username, email, phone, password) VALUES ('$fname','$lname','$un','$email','$phone','$p')";

         if (mysqli_query($dbc, $sql)) {
              echo "Registered successfully";
         } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }

            mysqli_close($dbc);
        }
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            font: 14px sans-serif;
            background-color: aliceblue;
        }

        .wrapper {
            width: 700px;

            padding: 20px;
            position: absolute;
            top: 5%;
            left: 25%;
        }

        .error {
            color: red;
        }

    </style>
</head>

<body>
    <br><br><br>
    <div class="wrapper">

        <div class="panel panel-default">
            <div style="text" class="panel-heading"><b>New User Registration</b></div>
            <div class="panel-body">

                <form method=POST action=signup.php>

                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" class="form-control" name="fname" required />
                    </div>

                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" class="form-control" name="lname" required />
                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" required />
                    </div>

                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" class="form-control" name="phone" required />
                    </div>

                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" class="form-control" name="username" required />
                    </div>

                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" required name="password" />
                    </div>

                    <div class="form-group">
                        <label>Confirm Password:</label>
                        <input type="password" class="form-control" name="confirmpass" required />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Register" />
                    </div>

                    <input type="hidden" name="register" value="Register" />

                </form>
            </div>
        </div>

    </div>

</body>

</html>
