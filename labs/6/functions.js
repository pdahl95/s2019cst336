// JavaScript File

/*global $*/
$(document).ready(function() {
    // Function call to fill up the dropdown menu 
    $.ajax({
        type: "GET",
        url: "api/getCategories.php",
        dataType: "json",
        success: function(data, status) {
            data.forEach(function(key) {
                $("#categories").append("<option value=" + key["catId"] + ">" + key["catName"] + "</option>");
            });
        }
    });


    $("#searchForm").on("click", function() {
        $.ajax({
            type: "GET",
            url: "api/getSearchResults.php",
            dataType: "json",
            data: {
                "product": $("[name=product]").val(),
                "category": $("select[name=category]").val(),
                "priceFrom": $("[name=priceFrom]").val(),
                "priceTo": $("[name=priceTo]").val(),
                "orderBy": $("[name=orderBy]:checked").val(),
            },
            success: function(data, status) {
                console.log($(this).children("option:selected").val());
                $("#results").html("<h3> Products Found: </h3>");
                data.forEach(function(key) {
                    $("#results").append("<a href='#' class='historyLink' id='" + key['productId'] + "'>History</a> ");
                    $("#results").append(key['productName'] + " " + key['productDescription'] + " $" + key['price'] + "<br>");
                });
            }
        });
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

    $.ajax({
        type: "GET",
        url: "api/getProducts.php",
        dataType: "json",
        success: function(data, status) {
            //alert(data[0].productName);
            data.forEach(function(product) {
                $("#products").append("<div class='row'>" +
                    "<div class='col1'>" + product.productName + "</div>" +
                    "<div class='col2'>" + "$" + product.productPrice + "</div>" +
                    "</div>");
            });
        },
        complete: function(data, status) { //optional, used for debugging purposes
            //alert(status);
        }

    }); //ajax

});
