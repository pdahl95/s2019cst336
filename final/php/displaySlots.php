<?php

   session_start();
    include '../dbConnection.php';
    $conn = getDatabaseConnection("final");
    
    $sql = "SELECT id,start_time,end_time,TIMESTAMPDIFF(MINUTE, start_time, end_time) as duration, booked_by_flag FROM dashboard WHERE start_time > UTC_TIMESTAMP()";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($response);
    

?>