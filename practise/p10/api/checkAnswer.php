<?php

//receive email and score from the quiz

    session_start();
    include '../dbConnection.php';
    $conn = getDatabaseConnection("quizLab");

//1. Get latest score based on email
//  if(isset($_GET['points'])){
//         $points = $_GET['points'];
        
//         $sql = "SELECT score from quizLab where points = $points";
//         $stmt = $conn->prepare($sql);
//         $response = $stmt->execute();
//         $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
//         echo json_encode($response);
//     }


//2. If record found, first display it in JSON format, then update record



//3. If record not found, insert a new record for that email
 if(isset($_GET['email'])){
        $email = $_GET['email'];
        // $score = $_GET['score'];
        // $taken = $_GET['taken'];
        
        // $sql = "INSERT INTO quiz (email, score, taken) WHERE NOT EXISTS 
        //     (SELECTE email FROM quiz WHERE email = '$email') VALUES ('$email','$score', '$taken');";
        $sql = "INSERT INTO quiz (email, score, taken) VALUES ('$email','', '');"
        $stmt = $conn->prepare($sql);
        $response = $stmt->execute();
        
        echo json_encode($response);
    }

?>