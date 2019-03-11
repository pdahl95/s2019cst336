<?php
// This PHP file is use for the username validation
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
        // Get the body json that was sent
        $rawJsonString = file_get_contents("php://input");
        // Make it a associative array (true, second param)
        $jsonData = json_decode($rawJsonString, true);
        // TODO: do stuff to get the $results which is an associative array
        $usernameArray = array('pdahl95', 'ruby97', 'samWest', 'rosario98', 'jasonhenderson', 'erick');
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        // Let the client know the format of the data being returned
        header("Content-Type: application/json");
        // Sending back down as JSON
        echo json_encode($usernameArray); 
        
        break;
    }
?>
