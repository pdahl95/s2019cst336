<?php

// $host = "localhost";
// $dbname = "your_db_name";
// $username = "yourUserName";
// $password = "your_password";

// $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// $connParts = parse_url($url);

// $host = $connParts['host'];
// $dbname = ltrim($connParts['path'],'/');
// $username = $connParts['user'];
// $password = $connParts['pass'];

$connUrl = getenv('JAWSDB_MARIA_URL');
//$connUrl = "uvrmbwpgnycuyc1s:smg0ff2qluhi96yz@er7lx9km02rjyf3n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/uvwpgd9q61wn8fld";

$connParts = null;
if ($hasConnUrl) {
    $connParts = parse_url($connUrl);
}

//var_dump($hasConnUrl);
$host = $hasConnUrl ? $connParts['host'] : getenv('IP');
$dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'crime_tips';
$username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
$password = $hasConnUrl ? $connParts['pass'] : '';

return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

?>