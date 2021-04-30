<?php

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkValidPwd($pwd) {
    $res = false;
    $regex = "/^(?=.*[a-z])(?=.*\d)[a-z\d]{8,}$/";
    if(!preg_match($regex, $pwd)) {
        $res = false;
    } else {
        $res = true;
    }
    return $res;
}

function get_random_quote(){
    include_once("mysqli_connect.php");
    $q = "SELECT * FROM quotes ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($dbc, $q);
    if($result) {
        // it return number of rows in the table.
        //$row = mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($result)) {
            return $row["quote"]." - ".$row["author"];
        }
        // close the result.
        mysqli_free_result($result);
        // Connection close 
        mysqli_close($dbc);
    }
}

function get_user_goal($uid){
    include_once("mysqli_connect.php");
    $sql = "SELECT goal FROM users WHERE id = $uid";
    $result = mysqli_query($dbc, $sql);
    $goal = "";
    if(mysqli_num_rows($result) == 1) {
        while($row = mysqli_fetch_row($result)) {
            $goal = $row[0];
        }
    }
    // close the result.
    mysqli_free_result($result);
    // Connection close 
    mysqli_close($dbc);

    return $goal;
}

function get_all_questions($quiz_id) {
    include_once("mysqli_connect.php");
    $sql = "SELECT id,description FROM questions WHERE quiz_id = $quiz_id";
    $result = mysqli_query($dbc, $sql);
    $questions = array();
    $qid = array();
    $ques = array();
    if($result) {
        while ($row = mysqli_fetch_row($result)) {
            array_push($qid, $row[0]);
            array_push($ques, $row[1]);
            //$q = array($qid, $ques);
        }
        array_push($questions, $qid, $ques);
        // close the result.
        mysqli_free_result($result);
        // Connection close 
        mysqli_close($dbc);
    }
    return $questions;
}

function get_all_answers($qid) {
    include_once("mysqli_connect.php");
    $sql = "SELECT id,answer,correct_answer FROM answers WHERE questions_id = $qid";
    $result = mysqli_query($dbc, $sql);
    $answers = array();
    $ans = array();
    if($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($answers, $row['answer']);
        }
        //array_push($answers, $ans);
        // close the result.
        mysqli_free_result($result);
        // Connection close 
        mysqli_close($dbc);
    }
    return $answers;
}

?>

