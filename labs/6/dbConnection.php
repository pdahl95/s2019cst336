<?php

function getDatabaseConnection($database = 'ottermart'){
    // Heroku connection string:
    //$connString = mysql://uvrmbwpgnycuyc1s:smg0ff2qluhi96yz@er7lx9km02rjyf3n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/uvwpgd9q61wn8fld
    // $host = 'er7lx9km02rjyf3n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    // $username = 'uvrmbwpgnycuyc1s';
    // $password = 'smg0ff2qluhi96yz';
    
    // C9 connection string:
    //$connString = "mysql://peerni95@localhost:3306/$database"
    $connString = getenv('JAWSDB_MARIA_URL');
    $hasConnString= !empty($connUrl);
    // $host = 'localhost';
    // $username = 'peerni95';
    // $password = '';

    $connParts = null;
    if ($hasConnString) {
        $connParts = parse_url($connString);
    }
    
    //var_dump($hasConnUrl);
    $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
    $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : $dbname;
    $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
    $password = $hasConnUrl ? $connParts['pass'] : '';
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

?>