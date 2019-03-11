<?php
// This PHP file is to autogenerate the passwords for the user
  session_start();

    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    switch($httpMethod) {
      case "OPTIONS":
        // Allows anyone to hit your API, not just this c9 domain
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Max-Age: 3600");
        exit();
      case 'POST':
        // getting the values of the input boxes
        $username =  $_POST['username'];
        $password =  $_POST['password'];
        
        // checking if the password contains the username, it is does return this error message 
        if (strpos($password, $username) !== false) {
            //password contains username
            echo json_encode("Error! Password should not contain username");
        }
    }
    
?>
