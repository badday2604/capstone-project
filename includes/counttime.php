<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $realgoal = $_REQUEST['realgoal'];
    $uid = $_REQUEST['uid'];

    echo $realgoal."-".$uid;
    if (empty($realgoal)) {
        echo "Goal is empty";
    } else {
        $mysqli = new mysqli("localhost", "root", "", "capstone");
        // Check connection
        if($mysqli === false){
            die("ERROR: Could not connect. " . $mysqli->connect_error);
        }
        // Attempt update query execution
        //$sql = "UPDATE users SET actual=$realgoal WHERE id=$uid";
        /* if($mysqli->query($sql) === true){
            echo $goal;
        } else{
            echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
        } */

        // Close connection
        $mysqli->close();

    }
}

?>