<?php
    require("config.php");
    if(empty($_SESSION['user']))
    {
        header("Location: index.php");
        die("Redirecting to index.php");
    }
    $currentVacationId = $_SESSION['currentVacationId'] ;
    $currentRowNum = $_SESSION['currentVacationPlanId'];

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
                document.getElementById("startingLocation").value = dataReturned.vcationPlan[0].starting_location;
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
            });
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
                startingLocation: document.getElementById("startingLocation").value,
                endingLocation:  document.getElementById("endingLocation").value,
                morningActivity: document.getElementById("morningActivity").value,
                afternoonActivity: document.getElementById("afternoonActivity").value,
                eveningActivity: document.getElementById("eveningActivity").value,
                lodging: document.getElementById("lodging").value
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

<body>

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
   </br> </br> </br> 
   <h4> Use this form to enter/edit information for the selected day. (select day id is <?php echo htmlentities($_SESSION['currentVacationPlanId'], ENT_QUOTES, 'UTF-8'); ?>)  </h4> 
     <p>
         <button type="button" class="btn btn-success"> </button> activity/lodging reservation not needed <br>
        <button type="button" class="btn btn-success"> </button> activity/lodging reservation confirmed <br>
        <button type="button" class="btn btn-warning"> </button> activity/lodging reservation needs confirmation <br>
        <button type="button" class="btn btn-danger"> </button> activity/lodging reservation not made <br>
     </p> <br><br>
   
   <form name="myForm" id="myForm" action="setDayDetails.php" method="GET">   
        startingLocation: <input id="startingLocation" name="startingLocation" size="15" type="text"  style="background-color:#FCF5D8;" />  <br><br>
        endingLocation: <input id="endingLocation"  name="endingLocation" size="15" type="text"  style="background-color:#FCF5D8;" />  <br><br>

        <br>

        morningActivity: <textarea  id="morningActivity" name="morningActivity" ROWS=3 COLS=30 style="background-color:#FCF5D8;" > </textarea > 
            <div class="btn-group btn-group-sm" role="group" aria-label="...">
              <button type="button" class="btn btn-success">. </button>
              <button type="button" class="btn btn-warning">. </button>
              <button type="button" class="btn btn-danger">. </button>
            </div>
        <br><br>
        afternoonActivity: <textarea  id="afternoonActivity" name="afternoonActivity" ROWS=3 COLS=30 style="background-color:#FCF5D8;"> </textarea >
            <div class="btn-group btn-group-sm" role="group" aria-label="...">
              <button type="button" class="btn btn-success">.</button>
              <button type="button" class="btn btn-warning">.</button>
              <button type="button" class="btn btn-danger">.</button>
            </div>
        <br><br>
        eveningActivity: <textarea  id="eveningActivity" name="eveningActivity"  ROWS=3 COLS=30 style="background-color:#FCF5D8;"> </textarea >
            <div class="btn-group btn-group-sm" role="group" aria-label="...">
              <button type="button" class="btn btn-success">.</button>
              <button type="button" class="btn btn-warning">.</button>
              <button type="button" class="btn btn-danger">.</button>
            </div>
        <br><br>
        lodging: <textarea  id="lodging" name="lodging" ROWS=3 COLS=30 style="background-color:#FCF5D8;"> </textarea >
            <div class="btn-group btn-group-sm" role="group" aria-label="...">
              <button type="button" class="btn btn-success">.</button>
              <button type="button" class="btn btn-warning">.</button>
              <button type="button" class="btn btn-danger">.</button>
            </div>
        
        </br> </br> <br> <br>
     
        <input name="Submit" type="submit" value="Submit" onclick="updateVacationPlan(<?php $currentVacationId ?>);"/>  
      <!-- <input name="Submit" type="submit" value="Submit" onclick="addtext();"/>  -->
     </form>
   
      <form action="fetchVacationRow.php" method="POST">
           rowID: <input id="fetchRow"  name="fetchRow"  type="text" value="FetchRow"  />  <br><br>
         <input type="submit" value="Submit"/> 
      </form>      

    </body>
 </div>
</html>
