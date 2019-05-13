<?php
    
    session_start();
    include '../dbConnection.php';
    $conn = getDatabaseConnection("final");
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    
        $sql = "DELETE FROM dashboard WHERE id = '$id';";
        $stmt = $conn->prepare($sql);
        $response = $stmt->execute();
        
        echo json_encode($response);
    }

?>