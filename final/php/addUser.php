<?php

    session_start();
    include '../dbConnection.php';
    $conn = getDatabaseConnection("final");
    
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $sql = "INSERT INTO user (id, email, password) VALUES ('', '$email', '$password');";
        $stmt = $conn->prepare($sql);
        $response = $stmt->execute();
        
        echo json_encode($response);
    
    }
?>