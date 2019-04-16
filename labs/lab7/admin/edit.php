<?php

    session_start();
 
    if (!isset($_SESSION['email'])){
      header("Location: login.html");
    }
    
    include '../dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    
        if(isset($_POST['edit'])){
            $prodID = $_POST['prodId'];
            
            $sql = "SELECT * FROM om_product WHERE productId = $prodID;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo json_encode($records);
            exit(0);
        }
        
        if(isset($_POST['update'])){
            $prodID = $_POST['prodId'];
            $prodName = $_POST['productName'];
            $prodPrice = $_POST['productPrice'];
            
            //UPDATE table_name SET column1 = value1, column2 = value2, ... WHERE condition;
           
            $sql = "UPDATE om_product SET productName = '$prodName', price = $prodPrice WHERE productId = $prodID;";

            $stmt = $conn->prepare($sql);
            $response = $stmt->execute();
            
            echo json_encode($response);
            exit(0);
        
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
                <input id="ID" type="text" name="prodId"/> <br> 
                
                <button id="findProd" class="btn btn-danger"> Find Product </button>
                
                <div id="resultProduct"> </div>
                
                <button id='updateRow' class='update' style="display: none;"> Update </button>
                
                
                <br> <br>
            </div>
            
        <button id="goBack" class="btn btn-danger"> Go back to Admin Dashboard </button>
            
            <button id="btn" class="btn btn-danger">Logout</button>
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
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
            
            $("#findProd").on("click", function() {
                   $.ajax({
                   type: "POST", 
                   url: "edit.php",
                   dataType: "json",
                   data: { 
                    'edit': '', 
                    "prodId": $("[name='prodId']").val(),
                    },
                   success: function(data,status){
                       console.log(data);
                       $("#resultProduct").html("Product" + "<br>");
                       $("#resultProduct").append("Product Name:"+ "<input type='text' name='productName' value='"+ data[0]['productName'] +"'>" + "<br>");
                       $("#resultProduct").append("Product Price:"+ "<input type='text' name='productPrice' value="+ data[0]['price'] +">" + "<br>");
                       $("#updateRow").show();
                       
                   }, 
                   error: function (){
                        alert("Fail!");
                    }
                });
            });
            
     
            
        $("#updateRow").on("click", function() {
           $.ajax({
               type: "POST", 
               url: "edit.php",
               dataType: "json",
               data: { 
                'update': '', 
                "prodId": $("[name='prodId']").val(), 
                "productName": $("[name='productName']").val(),
                "productPrice": $("[name='productPrice']").val(),
                },
               success: function(data,status){
                   alert("Success!");
               }, 
               error: function (){
                    alert("Fail!");
                }
           });
        });
        
        
            
        </script>
    </body>
</html>