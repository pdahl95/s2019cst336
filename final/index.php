<!DOCTYPE html>
<html lang="en">

<head>
    <title> Dashboard - Scheduler - Final Exam CST 336 </title>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    
</head>

<body>

    <div id="content">
        <!--header without text-->
        <header> </header>
        <!--invite link-->
        <div class="invite">
            Inviation Link: <input id="invite" type="text" name="invite" /> <img id="icon" src="https://www.kaspersky.com/content/en-global/images/icon-files.png"></img>
        </div>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" id="addSlots">Add Multiple Time Slots <img id="iconAdd" src="https://image.flaticon.com/icons/png/512/51/51830.png"></img> </button>


        <!--dashboard should come here-->
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>Duration</th>
                    <th>Booked By</th>
                </tr>
            </thead>
            <!--adding rows from the database-->
            
        </table>
        <!--dashboard with timeslots ends here -->

        <!--modal should only show if add time slot is clicked-->
        <div class="container">
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Time Slot</h4>
                        </div>
                        <div class="modal-body">
                            <p class="modalInput">Date <input type="date" name="datepicker"><img id="calIcon" src="https://banner2.kisspng.com/20180403/xqq/kisspng-solar-calendar-symbol-computer-icons-encapsulated-calendar-icon-5ac41db876fe09.0405027315228021044874.jpg"></img> </p>
                            <p class="modalInput">
                                <!--Start Time <input type="text" name="startTime" />-->
                                <label for="sel1">Start Time:</label>
                                  <select class="form-control" id="startTime">
                                      <?php
                                      for($i=0; $i<24; $i++){
                                          for($j=0; $j<60; $j+=15){
                                            echo sprintf("<option id='start'>%02d:%02d</option>",$i,$j);              
                                          }
                                      }
                                      ?>
                                  </select>
                            </p>
                            <p class="modalInput">Date <input type="date" name="datepickerEnd"><img id="calIcon" src="https://banner2.kisspng.com/20180403/xqq/kisspng-solar-calendar-symbol-computer-icons-encapsulated-calendar-icon-5ac41db876fe09.0405027315228021044874.jpg"></img> </p>

                            <p class="modalInput">
                                <!--End Time <input type="text" name="endTime" />-->
                                <label for="sel1">End Time:</label>
                                  <select class="form-control" id="endTime">
                                    <?php
                                      for($i=0; $i<24; $i++){
                                          for($j=0; $j<60; $j+=15){
                                            echo sprintf("<option id='end'>%02d:%02d</option>",$i,$j);              
                                          }
                                      }
                                      ?>
                                  </select>
                            </p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button id="modalAddSlot" type="button" class="btn btn">Add</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!--end of modal for adding time slots-->
        
        <!--modal for deleting time slots-->
        
        <div class="container">
            <!-- Modal -->
            <div class="modal fade" id="myModalDelete" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete Time Slot</h4>
                        </div>
                        <div class="modal-body">
                            <!--Data from the id should be presented here-->
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" id="cancelDelete" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" id="deleteSlot" class="btn btn-warning">Yes, Delete it! </button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!--end of modal for deleting time slots-->


    <!--<button id="btnToAvailApp" class="btn btn-info"> Test </button>-->
    <button id="linkToRubric" class="btn btn-info" style="position: fixed;bottom: 0;right: 0;margin: 25px;"> Link to Rubric </button>
    </div>
    <script type="text/javascript" src="js/functions.js"></script>
</body>

</html>
