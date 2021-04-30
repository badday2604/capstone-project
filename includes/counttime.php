<?php

include("dbPDO.php");

$json = file_get_contents('php://input');
$dataObject = json_decode($json);
$dataArray = json_decode($json, true);

//print_r($dataArray);

$userid = intval($dataArray['userid']);
$actual_goal = intval($dataArray['actual']);
$today = date("Ymd");

$result = update_user_actual_goal($userid, $actual_goal, $today);

if($result < 0) {
    echo "Fail to update";
}




