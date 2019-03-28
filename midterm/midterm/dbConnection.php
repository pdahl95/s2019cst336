<?php

function getDatabaseConnection($dbname = 'cinder'){
    // C9 connection string
    $host = 'localhost';
    $username = 'peerni95';
    $password = '';

    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

?>