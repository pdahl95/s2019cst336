<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection("cinder");
    
    $sql = "SELECT * 
FROM  `match` m RIGHT OUTER JOIN user u on u.id = m.user_id ORDER BY u.id ASC 
LIMIT 0 , 30";



//     SELECT u.name AS author_name, a.title, a.text, a.publish_date
// FROM  user u RIGHT OUTER JOIN
//       article a ON u.id = a.author_user_id
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($records);

?>