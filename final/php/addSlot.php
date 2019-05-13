<?php

    session_start();
    include '../dbConnection.php';
    $conn = getDatabaseConnection("final");
    
    if(isset($_POST['startDate'])){
        $dateStart = $_POST['startDate'];
        $dateEnd = $_POST['endDate'];
        
        // Defualt while inserting would be 1 as in NOT booked (2 would be booked)
        $sql = "INSERT INTO dashboard (id, start_time, end_time, booked_by_flag) VALUES ('', '$dateStart', '$dateEnd', '1');";
        $stmt = $conn->prepare($sql);
        $response = $stmt->execute();
        
        echo json_encode($response);
    }

?>