<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Available Appointments </title>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div id="content"> 
            <h3> Search for available appointments by date: </h3> <br> 
            <p class="modalInput">Date <input type="date" name="datepickerAvailable"><img id="calIcon" src="https://banner2.kisspng.com/20180403/xqq/kisspng-solar-calendar-symbol-computer-icons-encapsulated-calendar-icon-5ac41db876fe09.0405027315228021044874.jpg"></img> </p>
            <div class="timeSlotsAvailable"> 
                <!--<table class="table">-->
                <!--    <thead>-->
                <!--        <tr>-->
                <!--            <th>Date</th>-->
                <!--            <th>Start Time</th>-->
                <!--            <th>Duration</th>-->
                <!--            <th>Booked By</th>-->
                <!--        </tr>-->
                <!--    </thead>-->
                    <!--adding rows from the database-->
                <!--</table>-->
            
            
            </div>
        
        
            <button id="goBacktoDashboard" class="btn btn-warning"> Back to Dashboard </button>
        </div>

        
    <script type="text/javascript" src="functions.js"></script>
        <script>
        /* global $ */
            $("#goBacktoDashboard").on("click", function(){
               window.location = 'index.php'; 
            });
        </script>
    </body>
</html>