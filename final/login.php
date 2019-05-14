<?php
session_start();
echo $_SESSION["user"];
include 'dbConnection.php';
$conn = getDatabaseConnection("final");
if(isset($_SESSION["user"])){
    header("Location: index.php");
}

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $sql = "SELECT * FROM user WHERE email = '$email' and password='$password';"; 

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $response = $stmt->fetch(PDO::FETCH_ASSOC);
    echo count($response);
    
    if($response!=false && count($response) > 0){
        echo "I am here!";
        $_SESSION["user"] = "$username";
        header("Location: index.php");
        exit(0);
    }
        
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title> Log In </title>
    <link rel="stylesheet" href="css/login.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
    <body>
        <div class="wrapper fadeInDown">
          <div id="formContent">
            <div class="fadeIn first"> </div><br>
              <input type="text" id="login" class="fadeIn second" name="email" placeholder="email">
              <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
              <input id="loginBtn" type="submit" class="fadeIn fourth" value="Log In">
          </div>
        </div>
        <script>
              $("#loginBtn").on("click", function() {
                $.ajax({
                    type: "POST",
                    url: "login.php",
                    dataType: "json",
                    data: {
                        'email': $('[name=email]').val(),
                        'password': $('[name=password').val()
                    },
                    success: function(data, status) {
                        console.log(data);
                    },
                    error: function() {
                        alert("Fail!");
                    }
                });
    });
   </script>
      <!--<script type="text/javascript" src="js/login.js"></script>-->
    </body>
</html>

