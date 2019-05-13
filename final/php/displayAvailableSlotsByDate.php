<?php

   session_start();
    include '../dbConnection.php';
    $conn = getDatabaseConnection("final");
    
    if(isset($_POST['date'])){
        $dateStart = $_POST['date'];
        $sql = "SELECT id,start_time,end_time,TIMESTAMPDIFF(MINUTE, start_time, end_time) as duration, booked_by_flag FROM dashboard WHERE start_time = '$dateStart'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($response);
    }
?>