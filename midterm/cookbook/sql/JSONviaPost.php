<?php

    // JSON via POST -> Associative Array -> JSON
    // Get JSON that has been sent via an HTTP POST method to your PHP, then return it back to the requesting client.
    
    // Get the body json that was sent
    $rawJsonString = file_get_contents("php://input");
    
    // Make it a associative array (by making second param = true)
    $postedJsonData = json_decode($rawJsonString, true);
    
    // Allow any client to access
    header("Access-Control-Allow-Origin: *");
    
    // Let the client know the format of the data being returned
    header("Content-Type: application/json");
    
    // Sending back down as JSON
    echo json_encode($postedJsonData);
    
    // When would I use this?
    // It can be used any time JSON will be POST'ed or required in a GET, but would mostly be used in an AJAX call.

?>