<?php

    session_start();
    include '../dbConnection.php';
    $conn = getDatabaseConnection("image_grid");
    
  
        $sql = "SELECT img_url FROM lab8_image_grid;";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($response);
    

?>