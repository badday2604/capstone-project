<?php

// Db configs.
define('HOST', 'localhost');
define('PORT', 3306);
define('DATABASE', 'capstone');
define('USERNAME', 'root');
define('PASSWORD', '');
define('CHARSET', 'utf8');

/* define('HOST', 'sql5.freesqldatabase.com');
define('PORT', 3306);
define('DATABASE', 'sql5408786');
define('USERNAME', 'sql5408786');
define('PASSWORD', 'EsB3mleAYu');
define('CHARSET', 'utf8'); */

function create_connection() {
   /*
   * Create a PDO instance as db connection to db.
   * 
   * See: http://php.net/manual/en/class.pdo.php
   * See: http://php.net/manual/en/pdo.constants.php
   * See: http://php.net/manual/en/pdo.error-handling.php
   * See: http://php.net/manual/en/pdo.connections.php
   */
   $connection = new PDO(
      sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s', HOST, PORT, DATABASE, CHARSET)
      , USERNAME
      , PASSWORD
      , [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => FALSE,
      PDO::ATTR_PERSISTENT => TRUE
      ]
   );

   return $connection;
}

function get_lessons_by_course_id($courses_id) {
   $connection = create_connection();
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

function get_tutorials_by_lesson_id($lId) {
   $connection = create_connection();
   $sql = sprintf(
      'SELECT id,name,description,url FROM tutorials 
         %s'
      , isset($lId) ? 'WHERE lessons_id = :lessons_id' : ''
   );

   $bindings = [];
   if (isset($lId)) {
      $bindings[':lessons_id'] = $lId;
   }

   $statement = $connection->prepare($sql);
   $executed = $statement->execute($bindings);
   $fetchedData = $statement->fetchAll(PDO::FETCH_ASSOC);
   $tutorials = [];
   foreach ($fetchedData as $item) {
      $id = $item['id'];
      $name = $item['name'];
      $description = $item['description'];
      $url = $item['url'];

      if (!array_key_exists($id, $tutorials)) {
         $tutorials[$id] = [
            'name' => $name,
            'description' => $description,
            'url' => $url,
         ];
      }
   }
   return $tutorials;
}

function get_quizzes_by_lesson_id($lId) {
   $connection = create_connection();
   $sql = sprintf(
      'SELECT id,name,description FROM quiz 
         %s'
      , isset($lId) ? 'WHERE lessons_id = :lessons_id' : ''
   );

   $bindings = [];
   if (isset($lId)) {
      $bindings[':lessons_id'] = $lId;
   }

   $statement = $connection->prepare($sql);
   $executed = $statement->execute($bindings);
   $fetchedData = $statement->fetchAll(PDO::FETCH_ASSOC);
   $quizzes = [];
   foreach ($fetchedData as $item) {
      $id = $item['id'];
      $name = $item['name'];
      $description = $item['description'];

      if (!array_key_exists($id, $quizzes)) {
         $quizzes[$id] = [
            'name' => $name,
            'description' => $description,
         ];
      }
   }
   return $quizzes;
}

function get_questions_by_quiz_id($quizId) {
   $connection = create_connection();
   $ques_sql = sprintf(
      'SELECT id,description FROM questions 
         %s'
      , isset($quizId) ? 'WHERE quiz_id = :quiz_id' : ''
   );
   
   $bindings1 = [];
   if (isset($quizId)) {
      $bindings1[':quiz_id'] = $quizId;
   }
   
   $statement1 = $connection->prepare($ques_sql);
   $executed1 = $statement1->execute($bindings1);
   $fetchedData1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
   $questions = [];
   foreach ($fetchedData1 as $item) {
      $qId = $item['id'];
      $description = $item['description'];
   
      if (!array_key_exists($qId, $questions)) {
         $questions[$qId] = [
            'description' => $description,
         ];
      }
   }
   return $questions;
}

function get_answers_by_question_id($questionId) {
   $connection = create_connection();
   $sql = sprintf(
      'SELECT id,answer,correct_answer FROM answers 
         %s'
      , isset($questionId) ? 'WHERE questions_id = :questions_id' : ''
   );
   $bindings = [];
   if (isset($questionId)) {
      $bindings[':questions_id'] = $questionId;
   }
   $statement = $connection->prepare($sql);
   $executed = $statement->execute($bindings);
   $fetchedData = $statement->fetchAll(PDO::FETCH_ASSOC);
   $answers = [];
   foreach ($fetchedData as $item) {
      $aId = $item['id'];
      $answer = $item['answer'];
      $correct_answer = $item['correct_answer'];

      if (!array_key_exists($aId, $answers)) {
         $answers[$aId] = [
            'answer' => $answer,
            'correct_answer' => $correct_answer,
         ];
      }
   }
   return $answers;
}

function get_topics_by_category_id($catId) {
   $connection = create_connection();
   $sql = sprintf(
      'SELECT id,name,categories_id FROM topics 
         %s'
      , isset($catId) ? 'WHERE categories_id = :catId' : ''
   );
   $bindings = [];
   if (isset($catId)) {
      $bindings[':catId'] = $catId;
   }
   $statement = $connection->prepare($sql);
   $executed = $statement->execute($bindings);
   $fetchedData = $statement->fetchAll(PDO::FETCH_ASSOC);
   $topics = [];
   foreach ($fetchedData as $item) {
      $id = $item['id'];
      $name = $item['name'];
      $categories_id = $item['categories_id'];

      if (!array_key_exists($id, $topics)) {
         $topics[$id] = [
            'name' => $name,
            'categories_id' => $categories_id,
         ];
      }
   }
   return $topics;
}

function get_all_categories() {
   $connection = create_connection();
   $sql = 'SELECT * FROM categories';
   $statement = $connection->query($sql);
   $fetchedData = $statement->fetchAll(PDO::FETCH_ASSOC);
   $categories = [];
   foreach ($fetchedData as $item) {
      $id = $item['id'];
      $name = $item['name'];
      $description = $item['description'];

      if (!array_key_exists($id, $categories)) {
         $categories[$id] = [
            'name' => $name,
            'description' => $description,
         ];
      }
   }
   return $categories;
}

function get_topic_by_id($tId) {
   $connection = create_connection();
   $sql = sprintf(
      'SELECT * FROM topics 
         %s'
      , isset($tId) ? 'WHERE id = :tId' : ''
   );
   $bindings = [];
   if (isset($tId)) {
      $bindings[':tId'] = $tId;
   }
   $statement = $connection->prepare($sql);
   $executed = $statement->execute($bindings);
   $fetchedData = $statement->fetchAll(PDO::FETCH_ASSOC);
   $topic = array();
   foreach($fetchedData as $row) {
      $id = $row['id'];
      $name = $row['name'];
      $description = $row['description'];

      $topic[$id] = [
         'name' => $name,
         'description' => $description,
      ];
   }
   return $topic;
}

function get_courses_by_topic_id($tId) {
   $connection = create_connection();
   $sql = sprintf(
      'SELECT id,name,description FROM courses 
         %s'
      , isset($tId) ? ' WHERE topics_id = :tId' : ''
   );
   
   $bindings = [];
   if (isset($tId)) {
      $bindings[':tId'] = $tId;
   }
   
   $statement = $connection->prepare($sql);
   $executed = $statement->execute($bindings);
   $fetchedData = $statement->fetchAll(PDO::FETCH_ASSOC);
   $courses = [];
   foreach ($fetchedData as $item) {
      $id = $item['id'];
      $name = $item['name'];
      $description = $item['description'];
   
      if (!array_key_exists($id, $courses)) {
         $courses[$id] = [
            'name' => $name,
            'description' => $description,
         ];
      }
   }
   return $courses;
}

function get_user_by_user_id($userid) {
   $connection = create_connection();
   $sql = sprintf(
      'SELECT id,username,email,name,type,goal,actual,goal_date FROM users 
         %s'
      , isset($userid) ? ' WHERE id = :userid' : ''
   );
   
   $bindings = [];
   if (isset($userid)) {
      $bindings[':userid'] = $userid;
   }
   
   $statement = $connection->prepare($sql);
   $executed = $statement->execute($bindings);
   $fetchedData = $statement->fetchAll(PDO::FETCH_ASSOC);
   $user = [];
   foreach ($fetchedData as $item) {
      $id = $item['id'];
      $username = $item['username'];
      $email = $item['email'];
      $name = $item['name'];
      $type = $item['type'];
      $goal = $item['goal'];
      $actual = $item['actual'];
      $goal_date = $item['goal_date'];

      $user = array($id, $username, $email, $name, $type, $goal, $actual, $goal_date);
   
   }
   return $user;
}

function update_user_actual_goal($id, $actual, $goal_date) {
   $connection = create_connection();
   $sql = "UPDATE users SET actual=?, goaldate=? WHERE id=?";
   $stmt = $connection->prepare($sql);
   $stmt->execute([$actual, $goal_date, $id]);

   return $stmt->rowCount();
}

function update_user_lessons($userid, $lessonid, $detail, $progress, $completed, $result) {
   $connection = create_connection();
   $sql = "SELECT * FROM users_lessons WHERE users_id = ? AND lessons_id = ?";
   $stmt = $connection->prepare($sql);
   $rst = $stmt->execute([$userid, $lessonid]);

   if(($rst->rowCount()) >= 1) {
      $sql_update = "UPDATE users_lessons SET detail = ?, progress = ?, completed = ?, result = ? WHERE users_id = ? AND lessons_id = ?";
      $stmt1 = $connection->prepare($sql_update);
      $done = $stmt1->execute([$detail, $progress, $completed, $result, $userid, $lessonid]);
      if(!$done) {
         echo $stmt1->errorCode();
      }
   } else {
      $sql_insert = "INSERT INTO users_lessons (users_id, lessons_id, detail, progress, completed, result) VALUES (?,?,?,?,?,?)";
      $stmt2 = $connection->prepare($sql_insert);
      $done = $stmt2->execute([$userid, $lessonid, $completed, $detail, $progress, $completed, $result]);
      if(!$done) {
         echo $stmt2->errorCode();
      }
   }
}

