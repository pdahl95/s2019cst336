<?php
    session_start();
    
    if (!isset($_SESSION['email'])){
      header("Location: login.html");
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <style type="text/css">
            #btn{
                position: fixed;
                top:0;
                right: 0;
                margin: 8px;
            }
            #goToAdmin{
                position: fixed;
                top:2;
                right: 0;
                margin: 8px;
            }
        </style>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/simple-line-icons.css" rel="stylesheet">
    </head>
    <body>
        
        <main>
            <h1>Dashboard</h1>
            <a id="goToAdmin" href="admin/index.php">Go to admin dashboard</a>
            
                <div id="results">  </div>
                
                
                <!--<button id="test"> Click me </button>-->
                    <div class="modal" id="purchaseHistoryModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Product History</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> &times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="history"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
                    </div>
                </div>
            </div>
        </div>
            
           
            <button id="btn" class="btn btn-danger">Logout</button>
           
            
        </main>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <script>
        
        /* global $ */
    
        $.ajax({
            type: "GET",
            url: "api/getSearchResults.php",
            dataType: "json",
            data: {
                "product": $("[name='product']").val(),
                "category": $("[name='category']").val(),
                "priceFrom": $("[name='priceFrom']").val(),
                "priceTo": $("[name='priceTo']").val(),
                "orderBy": $("[name='orderBy']:checked").val(),
            },
            success: function(data, status) {
                $("#results").html("<h3> Products Found: </h3>");
                // console.log(data);
                for(var i in data) {
                    var key = data[i];
                    $("#results").append("<a href='#' class='historyLink' id='" + key['productId'] + "'>History</a> ");
                    $("#results").append(key['productName'] + " " + key['productDescription'] + " $" + key['price'] + "<br>");

                }
  
            }
        });
            
            $(document).on("click", '.historyLink', function() {
            $('#purchaseHistoryModal').modal("show");
    
            $.ajax({
                type: "GET",
                url: "api/getPurchaseHistory.php",
                dataType: "json",
                data: {
                    "productId": $(this).attr("id")
                },
                success: function(data, status) {
                    if (data.length != 0) {
                        $("#history").html("");
                        $("#history").append(data[0]['productName'] + "<br />");
                        $("#history").append("<img src='" + data[0]['productImage'] + "' width='200' /> <br />");
    
                        data.forEach(function(key) {
                            $("#history").append("Purchase Date: " + key['purchaseDate'] + "<br>");
                            $("#history").append("Unit Price: " + key['unitPrice'] + "<br>");
                            $("#history").append("Quantity: " + key['quantity'] + "<br>");
                        });
                    }
                    else {
                        $("#history").append("No purchase hisotry for this item.");
                        // $("#history").html("No purchase hisotry for this item.");
                    }
                }
            });
        });
        
            $("#btn").on("click", function() {
                window.location = "logout.php";
            })
        </script>
    </body>
</html>