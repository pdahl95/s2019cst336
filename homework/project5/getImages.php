<?php

    session_start();
    include 'dbConnection.php';
    $conn = getDatabaseConnection("media_dump");
  
        $sql = "SELECT media FROM media_dump;";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($response as $key => $value){
            $blob = $response[$key]['media'];
            $res = '<img src="data:image/jpeg;base64,'.base64_encode($blob).'"/>';
            echo $res;
        }
        

?>