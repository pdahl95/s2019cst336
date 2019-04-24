<?php

    session_start();
    include '../dbConnection.php';
    $conn = getDatabaseConnection("image_grid");
    
    if(isset($_GET['src'])){
        $img_URL = $_GET['src'];
        
        $sql = "DELETE FROM lab8_image_grid WHERE img_url = '$img_URL';";
        $stmt = $conn->prepare($sql);
        $response = $stmt->execute();
        
        echo json_encode($response);
    }

?>