<?php

   session_start();
    include '../dbConnection.php';
    $conn = getDatabaseConnection("final");
    
     if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM dashboard WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode($response);
        
        
    }
?>

