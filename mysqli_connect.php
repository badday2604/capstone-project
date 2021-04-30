<?php # Script 9.2 - mysqli_connect.php

// This file contains the database access information.
// This file also establishes a connection to MySQL,
// selects the database, and sets the encoding.

// Set the database access information as constants:
/* define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'capstone');
define('DB_PORT', '3306'); */

define('DB_USER', 'sql5408786');
define('DB_PASSWORD', 'EsB3mleAYu');
define('DB_HOST', 'sql5.freesqldatabase.com');
define('DB_NAME', 'sql5408786');
define('DB_PORT', '3306');

// Make the connection:
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');