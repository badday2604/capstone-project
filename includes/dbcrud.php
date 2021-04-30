<?php

require("dbPDO.php");

function get_lessons_by_course_id($courses_id) {

    $ques_sql = sprintf(
        'SELECT id,name as lname,courses_id FROM lessons 
            %s'
        , isset($courses_id) ? 'WHERE courses_id = :courses_id' : ''
    );

    $bindings1 = [];
    if (isset($courses_id)) {
        $bindings1[':courses_id'] = $courses_id;
    }

    $statement1 = $connection->prepare($ques_sql);
    $executed1 = $statement1->execute($bindings1);
    $fetchedData1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
    $lessons = [];
    foreach ($fetchedData1 as $item) {
        $lId = $item['id'];
        $name = $item['lname'];
        $courseId = $item['courses_id'];

        if (!array_key_exists($lId, $lessons)) {
            $lessons[$lId] = [
                'name' => $name,
                'courseId' => $courseId,
            ];
        }
    }
    return $lessons;
}