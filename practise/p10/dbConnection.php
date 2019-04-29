 <?php
 

function getDatabaseConnection($dbname){
    // Heroku connection string:
    //mysql://uvrmbwpgnycuyc1s:smg0ff2qluhi96yz@er7lx9km02rjyf3n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/uvwpgd9q61wn8fld
    
    // C9 connection string
    $host = 'localhost';
    $username = 'root';
    $password = '';
    
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 

    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}




// function getDatabaseConnection($dbname){
    
//     $host = 'localhost';//cloud 9
//     //$dbname = 'tcp';
//     $username = 'root';
//     $password = '';
    
//     //using different database variables in Heroku
//     if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
//         $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
//         $host = $url["host"];
//         $dbname = substr($url["path"], 1);
//         $username = $url["user"];
//         $password = $url["pass"];
//     } 
    
//     //creates db connection
//     $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
//     //display errors when accessing tables
//     $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     return $dbConn;
    
// }




 ?>