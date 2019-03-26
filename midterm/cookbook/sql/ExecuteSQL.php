<!--Execute SQL, Returning Associative Array-->
<!--Given a POST parameter named dataFromPost, create and execute a SQL statement that gets all columns -->
<!--from an MySQL database named study_guide for the dataFromPost parameter. -->
<!--Make sure the results are in the form of an associative array, not a cursor.-->

<?php

// Use $_POST if <form> data has been posted, or use
// $postedAssocArray = $_POST;
// or...
// JSON that has been decoded into an associative array
// $postedAssocArray = json_decode(file_get_contents("php://input"), true);

// Lookup the user in the user table
$servername = getenv('IP');
$dbPort = 3306;

// Which database (the name of the database in phpMyAdmin)?
$database = "study_guide";

// My user information...I could have prompted for password, as well, or stored in the
// environment, or, or, or (all in the name of better security)
$username = getenv('C9_USER');
$password = "";

// Establish the connection and then alter how we are tracking errors (look those keywords up)
$dbConn = new PDO("mysql:host=$servername;port=$dbPort;dbname=$database", $username, $password);
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Build the select statement (assuming the posted data has a field called dataFromPost)
$whereSql = "SELECT * FROM table WHERE column = :dataFromPost";

// The prepare caches the SQL statement for N number of parameters imploded above
$whereStmt = $dbConn->prepare($whereSql);

// Just have to pop in the associative array that comes from json_decode
$whereStmt->execute($postedAssocArray);

// Returns associative array instead of a cursor
$sqlQueryResultsAssocArray = $whereStmt->fetchAll(PDO::FETCH_ASSOC);

?>