<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <?php
        
            $weekdays = array();
            $weekdays[] = "M";
            $weekdays[] = "T"; 
            $weekdays[] = "Thur"; 
            $weekdays[] = "Fri"; 
            array_push($weekdays,"W"); 
            echo "Displaying values using var_dump:";
            var_dump($weekdays);
            echo "<br><br>";
            echo "Displaying values using print_r:";
            print_r($weekdays);
        
        ?> 

    </body>
</html>