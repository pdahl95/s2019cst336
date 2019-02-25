$(document).ready(function() {
    var towelPrice = 30;
    var sunscreenPrice = 10;
    var sandalsPrice = 20;
    var total = 0;
    var subtotal = 0;
    var tax = 0;
    var shipping = 0;
    var subtotal1;
    var subtotal2;
    var subtotal3;

    var nextDayPrice = 15;
    var threeDayPrice = 10;
    var normalPrice = 5;

    var shippingInfo;

    $('#quant1').change(function() {
        var quantTowel = parseFloat($('#quant1').val());
        subtotal1 = quantTowel * towelPrice;
        console.log(parseFloat($('#quant1').val()));
        $("#total1").html("$" + subtotal1);

    });
    $('#quant2').change(function() {
        var quantSuncreen = parseFloat($('#quant2').val());
        subtotal2 = quantSuncreen * sunscreenPrice;
        console.log(parseFloat($('#quant2').val()));
        $("#total2").html("$" + subtotal2);
    });
    $('#quant3').change(function() {
        var quantSandal = parseFloat($('#quant3').val());
        subtotal3 = quantSandal * sandalsPrice;
        console.log(parseFloat($('#quant3').val()));
        $("#total3").html("$" + subtotal3);

    });

    $("#btn").on("click", function() {
        shippingInfo = $("#shipping option:selected").val();
        var shippingCost = 0;
        if (shippingInfo == 'next') {
            shippingCost = nextDayPrice;
        }
        else if (shippingInfo == 'three') {
            shippingCost = threeDayPrice;
        }
        else if (shippingInfo == 'reg') {
            shippingCost = normalPrice;
        }
        else if (shippingInfo == '') {
            $("#error").html("A shipping option must be selected").css("color", "red");
        }
        $("#shippingInformation").html("$" + shippingCost);
        subtotal = subtotal1 + subtotal2 + subtotal3 + shippingCost;
        console.log("Subtotal is " + subtotal);
        $("#subtotalInfo").html("$" + subtotal);
        // console.log(shippingInfo);
        tax = subtotal * 0.10;
        $('#taxCost').html("$" + tax);

        total = tax + subtotal;
        $('#finalTotal').html("$" + total);

        var isChecked = $('#chkSelect').is(':checked');
        if (isChecked) {
            if($("input[type=text]") != ''){
                $('#thankyou').html('THANK YOU FOR YOUR PURCHASE').css("font-size", "42px");
            }
        }
        else {
            $("#accept").css("color", "red");
        }



    });



});
