<?php
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkValidPwd($pwd, $pwdRepeat) {
    $res = false;
    $regex = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
    if($pwd !== $pwdRepeat) {
        $res = false;
    } else {
        if(!preg_match($regex, $pwd)) {
            $res = false;
        } else {
            $res = true;;
        }
    }
    return $res;
}

?>