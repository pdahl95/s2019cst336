<?php
    session_start();
    if (!isset($_SESSION['email'])){
      header("Location: login.html");
    }
    
    include '../dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    
    if(isset($_POST['submit'])){
        $prod = $_POST['product'];
        $prodDesc = $_POST['prodDesc'];
        $cat = $_POST['categories'];
        $price = $_POST['price'];
        $sql = "INSERT INTO om_product (productName, productDescription, price, catId) VALUES ('$prod', '$prodDesc', '$price', '$cat');";
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
            .formdiv{
              width: 80%;
              margin-left: 10%;
              line-height: 1.6;
              font-size: 18px;
              font-weight: bold;
            }
            #addBtntoDataBase{
              border-radius: 10px;
            }
            main{
                margin-left: 2%;
            }
            
        </style>
        
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/simple-line-icons.css" rel="stylesheet">
    </head>
    <body>
        
        <main>
            <h1>Admin Dashboard - Add Product </h1>
            
        <div class="formdiv">
            <form id="form">
                Product Name: <input id="prod" type="text" name="product"/> <br> 
                Product Description: <input id="prodDesc" type="text" name="productDesc"/> <br> 
                Product Image: <input id="prodImg" type="text" name="productImg"/> <br> 
                Price: <input id="priceProd" type="text" name="price" size="7" /> <br>
                Category: <select name="category" id="categories">
                    <option value=""> Select One</option>
                  
                </select>
                <br>
            </form>
            
            <button id="addBtntoDataBase"> Add Product</button>

        </div>
        <br> <br>
        
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
            
            $.ajax({
                type: "GET",
                url: "../api/getCategories.php",
                dataType: "json",
                success: function(data, status) {
                    console.log(data);
                    $.each(data, function(i) {
                        var key = data[i];
                        $("#categories").append("<option value=" + key["catID"] + ">" + key["catName"] + "</option>");
                    });
                }
            });
            
        $("#addBtntoDataBase").on("click", function(){
            // alert("test");
            $.ajax({
               type: "POST", 
               url: "add.php",
               dataType: "json",
               data: { 
                'submit': '', 
                "product": $("[name='product']").val(),
                "prodDesc": $("[name='productDesc']").val(),
                "productImage" : $("[name='productImg']").val(),
                "price": $("[name='price']").val(),
                "category": $("[name='category']").val(),
                
                },
               success: function(data,status){
                   alert("Congratulations, you have succesfully added a product!");
               }, 
               error: function (){
                    alert("Fail to add product!");
                }
            });
        });
            
        </script>
    </body>
</html>