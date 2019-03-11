 $(document).ready(function() {
    //  alert("test to see if the file is connected");
     $.ajax({
         url: 'api/getRandomProduct.php',
         type: 'GET',
         dataType: "json",
         success: function(data) {
             $("#product").html(data.product);
             $("#price").html(data.price);
             $("#quant").val(data.quantiy);
             console.log(data.product, data.price, data.quantiy);
         }
     });

 });
 