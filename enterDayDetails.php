<?php
require("config.php");
if (empty($_SESSION['user'])) {
    header("Location: index.php");
    die("Redirecting to index.php");
}
$currentVacationId = $_SESSION['currentVacationId'];
$currentVacationPlanId = $_SESSION['currentVacationPlanId'];

?>

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIUrVy_InedXDCqKn3QsvuqGDwYdziiGI">
</script>

<script>

    function loadTravelResults() {
        calculateDistances();
    }

    function calculateDistances() {
        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix(
            {
                origins: [document.getElementById("startingLocation").value],
                destinations: [document.getElementById("endingLocation").value],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.IMPERIAL
            }, callback);
    }

    function callback(response, status) {
        if (status != google.maps.DistanceMatrixStatus.OK) {
            alert('Error was: ' + status);
        } else {
            var origins = response.originAddresses;
            var destinations = response.destinationAddresses;
            for (var i = 0; i < origins.length; i++) {
                var results = response.rows[i].elements;
                if (results[0].status == 'OK') {
                    for (var j = 0; j < results.length; j++) {
                        document.getElementById("travelTime").value =   (Math.round(results[j].duration.value / (60 * 60)*100)/100).toFixed(1);
                        document.getElementById("travelDistance").value = (Math.round(results[j].distance.value / 1609.34*100)/100).toFixed(1);
                        // distance.value is in meters,  duration.value is in seconds
                    }
                } else {
                    alert('unable to calculate, be sure to have a valid origin and destination');
                }
            }
        }
    }

</script>

<script>

    window.addEventListener('load', loadEnterDayDetails, false);

    function loadEnterDayDetails() {
        $.ajax({
            url: "fetchVacationRow.php",
            cache: false
        })
            .done(function (result) {
                //decode the JSON object received
                var dataReturned = JSON.parse(result);
                document.getElementById("dayDate").value = dataReturned.vcationPlan[0].day_date;
                document.getElementById("startingLocation").value = dataReturned.vcationPlan[0].starting_location;
                document.getElementById("travelTime").value = dataReturned.vcationPlan[0].travel_time;
                document.getElementById("travelDistance").value = dataReturned.vcationPlan[0].travel_distance;
                document.getElementById("endingLocation").value = dataReturned.vcationPlan[0].ending_location;
                document.getElementById("morningActivity").value = dataReturned.vcationPlan[0].morning;
                document.getElementById("afternoonActivity").value = dataReturned.vcationPlan[0].afternoon;
                document.getElementById("eveningActivity").value = dataReturned.vcationPlan[0].evening;
                document.getElementById("lodging").value = dataReturned.vcationPlan[0].lodging;

                document.getElementById("morningActivity").style.backgroundColor = dataReturned['statusDef'][dataReturned.vcationPlan[0].morning_status];  //'blue';
                document.getElementById("afternoonActivity").style.backgroundColor = dataReturned['statusDef'][dataReturned.vcationPlan[0].afternoon_status];
                document.getElementById("eveningActivity").style.backgroundColor = dataReturned['statusDef'][dataReturned.vcationPlan[0].evening_status];
                document.getElementById("lodging").style.backgroundColor = dataReturned['statusDef'][dataReturned.vcationPlan[0].lodging_status];

                document.getElementById("morning_status").value = dataReturned.vcationPlan[0].morning_status;
                document.getElementById("afternoon_status").value = dataReturned.vcationPlan[0].afternoon_status;
                document.getElementById("evening_status").value = dataReturned.vcationPlan[0].evening_status;
                document.getElementById("lodging_status").value = dataReturned.vcationPlan[0].lodging_status;

                //document.getElementById("vacDay").value = dataReturned.vcationPlan[0].row_number;
                //document.getElementById("vacation").value = dataReturned['vacationName']['vacation_id'];
                
                document.getElementById('DAY_IS').innerHTML = dataReturned.vcationPlan[0].row_number;
                document.getElementById('VAC_IS').innerHTML = dataReturned['vacationName']['vacation_id'];
            });
    }
    function undoEdits($vacationPlanId) {
            var result;
            bootbox.confirm("Are you sure you want to undo all your edits? Undo will reset the fields to what they were.", function(result) {
                if (result) {
                    loadEnterDayDetails();
                }
           }); 
    }

</script>

<script>

    function updateVacationPlan() {

        $.ajax({
            type: "GET",
            url: "setDayDetails.php",
            cache: false,
            async: false,
            data: { vacationPlanId: $vacationPlanId,
                dayDate: document.getElementById("dayDate").value,
                travelTime: document.getElementById("travelTime").value,
                travelDistance: document.getElementById("travelDistance").value,
                startingLocation: document.getElementById("startingLocation").value,
                endingLocation: document.getElementById("endingLocation").value,
                morningActivity: document.getElementById("morningActivity").value,
                afternoonActivity: document.getElementById("afternoonActivity").value,
                eveningActivity: document.getElementById("eveningActivity").value,
                lodging: document.getElementById("lodging").value,
                morningStatus: document.getElementById("morning_status").value,
                afternoonStatus: document.getElementById("afternoon_status").value,
                eveningStatus: document.getElementById("evening_status").value,
                lodgingStatus: document.getElementById("lodging_status").value
            },
            dataType: 'html'
        })
            .done(function (html) {
                window.location.href = "vacationSummary.php";
            })
            .fail(jqXHR, textStatus, errorThrown);// {
    }
</script>
<script>
    function setStatus(status, boxID, statusBoxID) {

        var color;

        switch (status)  // temporoary - really want to get vals from database
        {
            case 1:
                color = 'FF3333';
                break;
            case 2:
                color = 'FFE16A';
                break;
            case 3:
                color = '70DB70';
                break;
            default:
                alert('Default case');
                break;
        }
        document.getElementById(boxID).style.backgroundColor = color;
        document.getElementById(statusBoxID).value = status;
    }
</script>
<<<<<<< HEAD
<script>
    function setStatusQ(status, boxID, statusBoxID) {
        $.ajax({
            type: "GET",
            url: "getColor.php",
            cache: false,
            async: false,
            data: { status_id: status},
            dataType: 'html'
        })
        .done(function (result) {
            alert(result);
            //decode the JSON object received
            var dataReturned = JSON.parse(result);
            //alert(dataReturned);
            //alert("dataReturned[status] =  "+dataReturned[status]);
            document.getElementById(boxID).style.backgroundColor = dataReturned[status];
            document.getElementById(statusBoxID).value = status;
        })
      //  .fail(jqXHR, textStatus, errorThrown);
    }
</script>
<script>
    function mapIt() {
        alert("in mapIt function   " + document.getElementById("startingLocation").value);
        $.ajax({
            type: "GET",
            url: "mapIt.php",
            cache: false,
            async: false,
            data: {
                startingLocation: document.getElementById("startingLocation").value,
                endingLocation: document.getElementById("endingLocation").value,
            },
            dataType: 'html'
        })
            .done(function (html) {
                alert("back from map");
                // window.location.href = "enterDayDetails.php";
            });

    }
</script>
<script>
    function mapIt2() {
        alert("in mapIt2 function");
        var start = document.getElementById("startingLocation").value;
        var end = document.getElementById("endingLocation").value;
        var args = "startingLocation=" + start + "&endingLocation=" + end;
        window.location.href = "mapIt.php?" + args;
    }
</script>
=======
>>>>>>> origin/master

<!doctype html>
<!-- <html lang="en">   -->
<head>
    <meta charset="utf-8">
    <title>Vacation Welcome</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>
    <script src="libs/bootbox.min.js"></script> 
    <link href="libs/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="libs/bootstrap.min.css" rel="stylesheet" type="text/css"> 
    <style type="text/css">
        body {
            background: url(images/bglight.png);
        }

        .hero-unit {
            background-color: #fff;
        }

        .center {
            display: block;
            margin: 0 auto;
        }
    </style>

    <!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->

</head>

<!--<body>-->

<div class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a href="welcome.php" class="brand">Vacation</a>

            <div class="nav-collapse">
                <ul class="nav pull-right">
                    <!--<li><a href="register.php">Register</a></li>-->
                    <li class="divider-vertical"></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container hero-unit" id="divX">
    <body>

    <!--  (select day id is // <?php echo htmlentities($_SESSION['currentVacationDay'], ENT_QUOTES, 'UTF-8'); ?>   -->
    </br>
    <h4> status color codes: </h4>

    <p>
        <button type="button" class="btn btn-success"></button>
        activity/lodging reservation confirmed <br>
        <button type="button" class="btn btn-warning"></button>
        activity/lodging reservation needs confirmation <br>
        <button type="button" class="btn btn-danger"></button>
        activity/lodging reservation not made <br>
    </p>
    <br><h3> Now editing day  <span style="white-space:nowrap" id="DAY_IS">  </span> of vacation <span style="white-space:nowrap" id="VAC_IS">  </span> </h3>
  
    <br/>
    <!--
    <h3> Enter/edit information for
        Day: <textarea readonly maxlength="3" id="vacDay" name="vacDay" rows="1" cols="6"
                       style="font-weight: bold"> </textarea>
        of Vacation: <textarea readonly id="vacation" name="vacation" rows="1" cols="24"
                               style="font-weight: bold"> </textarea></h3> <br>
    -->
    <form name="myForm" id="myForm" action="setDayDetails.php" method="GET">
        date: <input readonly id="dayDate" name="dayDate" size="15" type="text"
                     style="background-color:#FCF5D8;"/><br><br>
        startingLocation: <input id="startingLocation" name="startingLocation" size="15" type="text"
                                 style="background-color:#FCF5D8; margin-right: 30px"/>
        endingLocation: <input id="endingLocation" name="endingLocation" size="15" type="text"
                               style="background-color:#FCF5D8;"/><br><br>
        travelDistance:<input id="travelDistance" name="travelDistance" size="15" type="text"
                              style="background-color:#FCF5D8; margin-right: 30px"/>
        travelTime: <input id="travelTime" name="travelTime" size="15" type="text" style="background-color:#FCF5D8;"/>
        <button type="button" class="btn btn-primary btn-lg" onclick="loadTravelResults()">Calculate</button>

        <br>

        <br>

        morningActivity: <textarea id="morningActivity" name="morningActivity" ROWS=4 COLS=60
                                   style="background-color:#FCF5D8;"> </textarea>

        <div class="btn-group btn-group-sm" role="group" aria-label="...">
            <button type="button" class="btn btn-success" onclick="setStatusQ(3,'morningActivity','morning_status');">.
            </button>
            <button type="button" class="btn btn-warning" onclick="setStatusQ(2,'morningActivity','morning_status');">.
            </button>
            <button type="button" class="btn btn-danger" onclick="setStatusQ(1,'morningActivity','morning_status');">.
            </button>
        </div>
        <input type="hidden" id="morning_status" name="morning_status" value="testValue" style="color:blue">
        <br> <br>
        afternoonActivity: <textarea id="afternoonActivity" name="afternoonActivity" ROWS=3 COLS=30
                                     style="background-color:#FCF5D8;"> </textarea>

        <div class="btn-group btn-group-sm" role="group" aria-label="...">
            <button type="button" class="btn btn-success"
                    onclick="setStatusQ(3,'afternoonActivity','afternoon_status');">.</button>
            <button type="button" class="btn btn-warning"
                    onclick="setStatusQ(2,'afternoonActivity','afternoon_status');">.</button>
            <button type="button" class="btn btn-danger" onclick="setStatusQ(1,'afternoonActivity','afternoon_status');">.</button>
        </div>
        <input type="hidden" id="afternoon_status" name="afternoon_status" value="testValue" style="color:blue">
        <br><br>
        eveningActivity: <textarea id="eveningActivity" name="eveningActivity" ROWS=3 COLS=30
                                   style="background-color:#FCF5D8;"> </textarea>

        <div class="btn-group btn-group-sm" role="group" aria-label="...">
            <button type="button" class="btn btn-success" onclick="setStatusQ(3,'eveningActivity','evening_status');">.
            </button>
            <button type="button" class="btn btn-warning" onclick="setStatusQ(2,'eveningActivity','evening_status');">.
            </button>
            <button type="button" class="btn btn-danger" onclick="setStatusQ(1,'eveningActivity','evening_status');">.
            </button>
        </div>
        <input type="hidden" id="evening_status" name="evening_status" value="testValue" style="color:blue">
        <br><br>
        lodging: <textarea id="lodging" name="lodging" ROWS=3 COLS=30 style="background-color:#FCF5D8;"> </textarea>

        <div class="btn-group btn-group-sm" role="group" aria-label="...">
            <button type="button" class="btn btn-success" onclick="setStatusQ(3,'lodging','lodging_status');">.</button>
            <button type="button" class="btn btn-warning" onclick="setStatusQ(2,'lodging','lodging_status');">.</button>
            <button type="button" class="btn btn-danger" onclick="setStatusQ(1,'lodging','lodging_status');">.</button>
        </div>
        <input type="hidden" id="lodging_status" name="lodging_status" value="testValue" style="color:blue">
        </br> </br> <br> <br>


        <button  type="submit" class="btn btn-success" onclick="updateVacationPlan(<?php $currentVacationId ?>);"> SAVE </button>
        your changes,  or ....  
        <button type="button" class="btn btn-danger" onclick="undoEdits();"> CANCEL </button> them, then re-do your edits, or
        <button type="button" class="btn btn-warning" onclick='window.location.href = "vacationSummary.php";'> GoBack </button> to VacationPlan.
        
    </form>

    <!--      <form action="fetchVacationRow.php" method="POST">-->
    <!--           rowID: <input id="fetchRow"  name="fetchRow"  type="text" value="FetchRow"  />  <br><br>-->
    <!--         <input type="submit" value="Submit"/> -->
    <!--      </form>      -->

    </body>
</div>
<!-- Modal -->
<div class="modal fade" id="modalComputeDistance" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    This Modal title
                </h4>
            </div>

            <div class="modal-body">
                Add some text here
                <form id="modalForm" name="modalForm">
                    <label>Origin:
                        <input type="text" name="origin" id="origin" required="required" placeholder="starting place"
                               value=startingLocation.value; ?>" />
                    </label>
                    <label>Destination:
                        <input type="text" name="destination" id="destination" required="required"
                               placeholder="ending place" value=""/>
                    </label>
                    <label>
                        <button type="button" onclick="calculateDistances();">Calculate</button>
                    </label>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">Close
                </button>
                <button type="button" class="btn btn-primary">
                    Submit changes
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->
</html>
