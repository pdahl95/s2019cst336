<?php

    session_start();

    if (!isset($_SESSION['email'])){
      header("Location: login.html");
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Dashboard</title>
        <style type="text/css">
            #btn{
                position: fixed;
                top: 0;
                right: 0;
                margin: 8px;
            }
            main{
                margin-left: 2%;
            }
            #edit{
              color: white;
              background-color: black;
              border: 1px black solid;
              margin-top: 10px;
          }
          #edit:hover{
              color: black;
              background-color: white;
          }
          
            
        </style>
        
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/simple-line-icons.css" rel="stylesheet">
    </head>
    <body>
        
        <main>
            <h1>Admin Dashboard - Edit Product </h1>
            
            <div id="cont"> 
                What product do you want to edit? <br> 
                Please provide the Product ID below: <br> 
                <input type="text" name="prodId"/> <br> 
                
                <button id="edit" class="btn btn-danger"> Edit Product </button>
                
                
                <br> <br>
            </div>
            
        <button id="goBack" class="btn btn-danger"> Go back to Admin Dashboard </button>
            
            <button id="btn" class="btn btn-danger">Logout</button>
        </main>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script>
        /* global $ */
        
         $("#btn").on("click", function() {
                window.location = "../logout.php";
            }); 
            
            $("#goBack").on("click", function() {
                window.location = "index.php";
            }); 
            
     
            
        
        
        
            
        </script>
    </body>
</html>