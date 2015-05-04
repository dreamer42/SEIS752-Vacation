<?php
    require("config.php");
    if(empty($_SESSION['user']))
    {
        header("Location: index.php");
        die("Redirecting to index.php");
    }

    $currentVacationId = $_SESSION['currentVacationId'] ;

?>

<script>

    window.addEventListener('load', loadVacationSummary, false);

    function loadVacationSummary() {
        $.ajax({
            url: "vacationSummaryList.php",
            cache: false
        })
            .done(function (html) {
                document.getElementById("TheListOfDays").innerHTML = html;
            });
    }

    function redirectToEnterDayDetails($vacationPlanId) {
        $.ajax({
            url: "setCurrentVacationPlanId.php",
            cache: false,
            async: false,
            data: { vacationPlanId: $vacationPlanId }
        })
            .done(function (html) {
                window.location.href = "enterDayDetails.php"
            });
    }

    function deleteDay($vacationPlanId) {
        var result;
        bootbox.confirm("Are you sure you want to delete this day?", function(result) {
                if (result) {
                    $.ajax({
                        url: "deleteVacationPlan.php",
                        cache: false,
                        async: false,
                        data: { vacationPlanId: $vacationPlanId }
                    })
                        .done(function () {
                            window.location.href = "vacationSummary.php"
                        });
                }
           }); 
    }

    function addNewDay() {
        $.ajax({
            url: "getCurrentVacationId.php",
            cache: false,
            async: false
        })
            .done(function ($currentVacationId) {
                $.ajax({
                    url: "getNextVacationPlanInfo.php",    // TODO: new php, vacationSummaryList is just here temp
                    cache: false,
                    async: false,
                    data: { vacationId: $currentVacationId }
                })
                    .done(function (result) {
                        var dataReturned = JSON.parse(result);

                        $.ajax({
                            url: "insertVacationPlan.php",
                            cache: false,
                            async: false,
                            data: { vacationId: $currentVacationId, rowNumber: dataReturned.NEXT_ROW_NUMBER, dayDate:dataReturned.NEXT_DAY_DATE, startingLocation: dataReturned.NEXT_STARTING_LOCATION  }
                        })
                            .done(function ($vacationPlanId) {
                                redirectToEnterDayDetails($vacationPlanId);
                            });
                    });
                });
    }

    function goToMap() {
        window.location.href = "displayMap.php"
    }

    function goToAnalysis() {
        window.location.href = "displayAnalysis.php"
    }

</script>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Vacation Welcome</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>
    <script src="libs/bootbox.min.js"></script> 
    <link href="libs/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="libs/bootstrap.min.css" rel="stylesheet" type="text/css">
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
          <li class="divider-vertical"></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="container hero-unit">
    <h2>Learn more about your vacation or work with individual days below.</h2>
    <button name="Map" class="btn btn-primary btn-large" value="Map" onClick="goToMap()" >Map <i class="icon-white icon-map-marker"></i></button>
    <button class="btn btn-primary btn-large" value="Analysis" onClick="goToAnalysis()" >Vacation Analyzer <i class="icon-white icon-tasks"></i></button>
</div>

<div id="TheListOfDays" class="container hero-unit"></div>

</body>
</html>