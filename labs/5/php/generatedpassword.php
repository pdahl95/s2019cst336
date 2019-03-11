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
        // calling the password generated function, saves it in a variabel
        $result = randomPassword();
         // Get the body json that was sent
        $rawJsonString = file_get_contents("php://input");
        // Make it a associative array (true, second param)
        $jsonData = json_decode($rawJsonString, true);
        // TODO: do stuff to get the $results which is an associative array
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        // Let the client know the format of the data being returned
        header("Content-Type: application/json");
        // Sending back down as JSON with the variable used above when calling the function
        echo json_encode($result); 
        break;
    }
    
    // function to create and make the random password to be suggested for the user 
     function randomPassword() {
              $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
              $pass = array(); //remember to declare $pass as an array
              $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
              for ($i = 0; $i < 8; $i++) {
                  $n = rand(0, $alphaLength);
                  $pass[] = $alphabet[$n];
              }
              return implode($pass); //turn the array into a string
          }
?>
