<?php
    require("config.php");
    if(empty($_SESSION['user']))
    {
        header("Location: index.php");
        die("Redirecting to index.php");
    }
    $currentVacationId = $_SESSION['currentVacationId'] ;
    $currentVacationPlanId = $_SESSION['currentVacationPlanId'];

?>


<script>

    window.addEventListener('load', loadEnterDayDetails, false);

    function loadEnterDayDetails() {
        $.ajax({
            url: "fetchVacationRow.php",
            cache: false
        })
            .done(function (result) {
                //alert("RESULTS: "+result);

                //decode the JSON object received
                //  $data['statusDef'] = $colorArray;   $data['vcationPlan'] = $resultArray; 
                var dataReturned = JSON.parse(result);
                document.getElementById("dayDate").value = dataReturned.vcationPlan[0].day_date;
                document.getElementById("startingLocation").value = dataReturned.vcationPlan[0].starting_location;
                document.getElementById("travelTime").value = dataReturned.vcationPlan[0].travel_time;
                document.getElementById("travelDistance").value = dataReturned.vcationPlan[0].travel_distance;
                document.getElementById("endingLocation").value = dataReturned.vcationPlan[0].ending_location;
                document.getElementById("morningActivity").value = dataReturned.vcationPlan[0].morning;
                document.getElementById("afternoonActivity").value = dataReturned.vcationPlan[0].afternoon;
                document.getElementById("eveningActivity").value =  dataReturned.vcationPlan[0].evening;
                document.getElementById("lodging").value = dataReturned.vcationPlan[0].lodging;
                
               // alert(dataReturned['statusDef'][dataReturned.vcationPlan[0].morning_status]); 
                document.getElementById("morningActivity").style.backgroundColor = dataReturned['statusDef'][dataReturned.vcationPlan[0].morning_status];  //'blue'; 
                document.getElementById("afternoonActivity").style.backgroundColor = dataReturned['statusDef'][dataReturned.vcationPlan[0].afternoon_status];
                document.getElementById("eveningActivity").style.backgroundColor = dataReturned['statusDef'][dataReturned.vcationPlan[0].evening_status];
                document.getElementById("lodging").style.backgroundColor = dataReturned['statusDef'][dataReturned.vcationPlan[0].lodging_status];
                
                document.getElementById("morning_status").value =  dataReturned.vcationPlan[0].morning_status;
                document.getElementById("afternoon_status").value =  dataReturned.vcationPlan[0].afternoon_status;
                document.getElementById("evening_status").value =  dataReturned.vcationPlan[0].evening_status;
                document.getElementById("lodging_status").value =  dataReturned.vcationPlan[0].lodging_status;
                
                document.getElementById("vacDay").value = dataReturned.vcationPlan[0].row_number;  
                document.getElementById("vacation").value = dataReturned['vacationName']['vacation_id'];
                
            });
    }
    function undoEdits($vacationPlanId) {
        var result = confirm("Are you sure you want to undo all your edits? Undo will reset the fields to what they were.");
        if (result) {
            loadEnterDayDetails();
        }
    }

</script>

<script>

    function addtext() {

        var newtext =  document.getElementById("morningActivity").value ;  // this will echo out the default value
        newtext = newtext + ", " + document.getElementById("afternoonActivity").value ;
        alert( newtext);

    }
    function updateVacationPlan() {

        $.ajax({
            type: "GET",
            url: "setDayDetails.php",
            cache: false,
            async: false,
            data: { vacationPlanId: $vacationPlanId,
                dayDate: document.getElementById("dayDate").value;
                travelTime: document.getElementById("travelTime").value;
                travelDistance: document.getElementById("travelDistance").value;
                startingLocation: document.getElementById("startingLocation").value,
                endingLocation:  document.getElementById("endingLocation").value,
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
            });
    .fail(jqXHR, textStatus, errorThrown) {
            alert("failed");
        });
    }
</script>
<script>
    function setStatus(status, boxID, statusBoxID) {

        var color; 
        
        switch (status)  // temporoary - really vant to get vals from database
        {
           case 1: color = 'FF3333';  break;
           case 2: color = 'FFE16A'; break;
           case 3: color = '70DB70'; break;
           case 4: color = '9ae59a'; break;
           default:
             alert('Default case');
             break;
       }
       document.getElementById(boxID).style.backgroundColor = color;
       document.getElementById(statusBoxID).value = status;
    }
</script>
<script>
function mapIt()  {
    alert("in map"+document.getElementById("startingLocation").value);
           $.ajax({
            type: "GET",
            url: "map.php",
            cache: false,
            async: false,
            data: {
                 startingLocation: document.getElementById("startingLocation").value,
                 endingLocation:   document.getElementById("endingLocation").value,
            },
            dataType: 'html'
        })
        .done(function (html) {
            alert("back from map");
            //    window.location.href = "enterDayDetails.php";
        });
}

</script>

<!doctype html>
<!-- <html lang="en">   -->
<head>
    <meta charset="utf-8">
    <title>Vacation Welcome</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <link href="libs/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
        body { background: url(images/bglight.png); }
        .hero-unit { background-color: #fff; }
        .center { display: block; margin: 0 auto; }
    </style>
    
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
   </br> </br> </br> 
   <h4> status color codes: </h4>
     <p>
        <button type="button" class="btn btn-success"> </button> activity/lodging reservation confirmed <br>
        <button type="button" class="btn btn-warning"> </button> activity/lodging reservation needs confirmation <br>
        <button type="button" class="btn btn-danger"> </button> activity/lodging reservation not made <br>
     </p> <br><br>
     <h3> Enter/edit information for 
     Day: <textarea readonly maxlength="3" id="vacDay" name="vacDay" rows="1" cols="6" style="font-weight: bold" > </textarea > 
     of Vacation:  <textarea readonly  id="vacation" name="vacation" rows="1" cols="24" style="font-weight: bold" > </textarea >  </h3> <br>
        
   <form name="myForm" id="myForm" action="setDayDetails.php" method="GET"> 
        date: <input readonly id="dayDate" name="dayDate" size="15" type="text"  style="background-color:#FCF5D8;" /><br><br>
        startingLocation: <input id="startingLocation" name="startingLocation" size="15" type="text"  style="background-color:#FCF5D8;" /> .    .      
        endingLocation: <input id="endingLocation"  name="endingLocation" size="15" type="text"  style="background-color:#FCF5D8;" /><br><br>
        travelDistance:<input id="travelDistance"  name="travelDistance" size="15" type="text"  style="background-color:#FCF5D8;" /> .       .
        travelTime: <input id="travelTime"  name="travelTime" size="15" type="text"  style="background-color:#FCF5D8;" />
        <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalComputeDistance">Compute travel Distance </button>  -->
        <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='mapIt.php'" >  Compute travel Distance </button>        
        <!--     <button type="button" class="btn btn-primary btn-lg" onclick="mapIt();" >  Compute travel Distance </button>  -->

</button>
        <br><br>

        <br>

        morningActivity: <textarea  id="morningActivity" name="morningActivity" ROWS=4 COLS=60 style="background-color:#FCF5D8;" > </textarea > 
            <div class="btn-group btn-group-sm" role="group" aria-label="...">
              <button type="button" class="btn btn-success" onclick= "setStatus(3,'morningActivity','morning_status');">. </button>
              <button type="button" class="btn btn-warning" onclick= "setStatus(2,'morningActivity','morning_status');">. </button>
              <button type="button" class="btn btn-danger" onclick= "setStatus(1,'morningActivity','morning_status');">. </button>
            </div>
        <input type="hidden"  id="morning_status" name="morning_status" value="testValue" style="color:blue" >
        <br> <br>
        afternoonActivity: <textarea  id="afternoonActivity" name="afternoonActivity" ROWS=3 COLS=30 style="background-color:#FCF5D8;"> </textarea >
            <div class="btn-group btn-group-sm" role="group" aria-label="...">
              <button type="button" class="btn btn-success" onclick= "setStatus(3,'afternoonActivity','afternoon_status');">. </button>
              <button type="button" class="btn btn-warning" onclick= "setStatus(2,'afternoonActivity','afternoon_status');">. </button>
              <button type="button" class="btn btn-danger" onclick= "setStatus(1,'afternoonActivity','afternoon_status');">. </button>
            </div>
        <input type="hidden"  id="afternoon_status" name="afternoon_status" value="testValue" style="color:blue" >
        <br><br>
        eveningActivity: <textarea  id="eveningActivity" name="eveningActivity"  ROWS=3 COLS=30 style="background-color:#FCF5D8;"> </textarea >
            <div class="btn-group btn-group-sm" role="group" aria-label="...">
              <button type="button" class="btn btn-success" onclick= "setStatus(3,'eveningActivity','evening_status');">. </button>
              <button type="button" class="btn btn-warning" onclick= "setStatus(2,'eveningActivity','evening_status');">. </button>
              <button type="button" class="btn btn-danger" onclick= "setStatus(1,'eveningActivity','evening_status');">. </button>
            </div>
        <input type="hidden"  id="evening_status" name="evening_status" value="testValue" style="color:blue" >
        <br><br>
        lodging: <textarea  id="lodging" name="lodging" ROWS=3 COLS=30 style="background-color:#FCF5D8;"> </textarea >
            <div class="btn-group btn-group-sm" role="group" aria-label="...">
              <button type="button" class="btn btn-success" onclick= "setStatus(3,'lodging','lodging_status');">. </button>
              <button type="button" class="btn btn-warning" onclick= "setStatus(2,'lodging','lodging_status');">. </button>
              <button type="button" class="btn btn-danger" onclick= "setStatus(1,'lodging','lodging_status');">. </button>
            </div>
        <input type="hidden"  id="lodging_status" name="lodging_status" value="testValue" style="color:blue" >
        </br> </br> <br> <br>
     
        <input name="Save" type="submit" value="Save" onclick="updateVacationPlan(<?php $currentVacationId ?>);"/>  .........
        <input name="Cancel" type="button" value="Cancel" onclick="undoEdits();"/>  <!--undoEdits  loadEnterDayDetails-->
      <!-- <input name="Submit" type="submit" value="Submit" onclick="addtext();"/>  -->
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
                      <input type="text" name="origin" id="origin" required="required" placeholder="starting place" value= startingLocation.value; ?>" />
                    </label>
                    <label>Destination:
                      <input type="text" name="destination" id="destination" required="required" placeholder="ending place"  value="" />
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
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</html>
