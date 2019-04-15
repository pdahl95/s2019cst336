<?php

function getDatabaseConnection($dbname = 'ottermart'){
    // Heroku connection string:
    //mysql://uvrmbwpgnycuyc1s:smg0ff2qluhi96yz@er7lx9km02rjyf3n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/uvwpgd9q61wn8fld
    
    // C9 connection string
    $host = 'localhost';
    $username = 'root';
    $password = '';
    
      if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 

    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

?>