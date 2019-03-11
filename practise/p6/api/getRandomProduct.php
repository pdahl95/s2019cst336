<?php

  session_start();

    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    switch($httpMethod) {
      case "OPTIONS":
        // Allows anyone to hit your API, not just this c9 domain
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Max-Age: 3600");
        exit();
      case 'GET':
        $productArray = array();
        $productArray['product'] = "Microfiber Beach Towel";
        $productArray['price'] = "40";
        $productArray['quantiy'] = "2"; 
        
        $products = array();
        array_push($products, $productArray);
        
        $productArray['product'] = "Flip-flop Sandals";
        $productArray['price'] = "30";
        $productArray['quantiy'] = "5"; 
        
        array_push($products, $productArray);
        
        $productArray['product'] = "Sunscreen 80SPF";
        $productArray['price'] = "25";
        $productArray['quantiy'] = "3"; 
        
        array_push($products, $productArray);
        
        $productArray['product'] = "Plastic Flying Disc";
        $productArray['price'] = "15";
        $productArray['quantiy'] = "4"; 
        
        array_push($products, $productArray);
        
        $productArray['product'] = "Beach Umbrella";
        $productArray['price'] = "75";
        $productArray['quantiy'] = "1"; 

        array_push($products, $productArray);
        
        echo json_encode($products[rand(0,1)]);
        
    }
    
?>


