<?php

    session_start();
    include '../dbConnection.php';
    $conn = getDatabaseConnection("image_grid");
    
    if(isset($_GET['src'])){
        $img_URL = $_GET['src'];
        
        $sql = "INSERT INTO lab8_image_grid (img_id, img_url) VALUES ('','$img_URL');";
        $stmt = $conn->prepare($sql);
        $response = $stmt->execute();
        
        echo json_encode($response);
    }

?>