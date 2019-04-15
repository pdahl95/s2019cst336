<?php
    session_start();
    
    if (!isset($_SESSION['email'])) {
        http_response_code(401);
        exit();
    } else if (!$_SESSION['isAdmin']) {
        header("Location: ../no-access.php");
    }
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin Dashboard</title>
        <style type="text/css">
            #add, #edit, #delete{
                display: block;
                margin: 8px;
                border-radius: 5px;
                font-weight: bold;
            }
            #btn{
                position: fixed;
                top: 0;
                right: 0;
                margin: 8px;
            }
            #add:hover, #edit:hover, #delete:hover{
                background-color: black;
                color: white;
            }
            main{
                margin-left: 2%;
            }
        </style>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/simple-line-icons.css" rel="stylesheet">
    </head>
    <body>
        
        <main>
            <h1>Admin Dashboard</h1>
            
            <div> 
                Please choose an action below: 
            </div>
            
            <button id="add"> Add New Product </button>
            <button id="edit"> Edit Product </button>
            <button id="delete"> Delete Product </button>
            
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
            
            $("#add").on("click", function(){
                window.location = "add.php";
            });
            
            $("#edit").on("click", function() {
                window.location = "edit.php";
            }); 
            
            $("#delete").on("click", function() {
                window.location = "delete.php";
            }); 
        </script>
    </body>
</html>