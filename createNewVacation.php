<?php
    require("config.php");
    if(empty($_SESSION['user']))
    {
        header("Location: index.php");
        die("Redirecting to index.php");
    }
?>


<script>
    function createNewVacation() {

        // code below does the following:
        // insert a record in vacation, uses the returning vacation id to set that value in session
        // then insert a record in vacation plan, uses the return vacation plan id to set that value in the session
        // lastly, it switches to the entry screen to fill in a newly created day in the vacation plan

        // TODO : do we want to validate here?
        //          vacation name unique for this user?
        //          date valid?

        $.ajax({
            url: "insertVacation.php",
            cache: false,
            async: false,
            data: { name: vacationName.value }
        })
            .done(function (vacationId) {
                $.ajax({
                    url: "setCurrentVacationId.php",
                    cache: false,
                    async: false,
                    data: { vacationId: vacationId }
                })
                .done(function () {
                    $.ajax({
                        url: "insertVacationPlan.php",
                        cache: false,
                        async: false,
                        data: { vacationId: vacationId, rowNumber: 1, dayDate: startDate.value, startingLocation: "" }
                    })
                    .done(function (vacationPlanId) {
                        $.ajax({
                            url: "setCurrentVacationPlanId.php",
                            cache: false,
                            async: false,
                            data: { vacationPlanId: vacationPlanId }
                        })
                        .done(function () {
                            window.location.href = "enterDayDetails.php"
                        });
                    });
                })
            });
    }


</script>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Vacation Welcome</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>
    <link href="libs/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="libs/vacation.css" rel="stylesheet" media="screen">

    <style type="text/css">
        body { background: url(images/bglight.png); }
        .hero-unit { background-color: #fff; }
        .center { display: block; margin: 0 auto; }
    </style>

    <script>
        $(function() {
            $( "#startDate" ).datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                stepMonths: 12
            });
        });
    </script>

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
    <form id="newVacation" name="newVacation" method="get" >
        <label>Vacation Name:
            <input type="text" name="vacationName" id="vacationName" value="" />
        </label>
        <label>Start Date:
            <input type="text" name="startDate" id="startDate" value="" />
        </label>
        <label>
            <button type="button" onclick="createNewVacation()">Create Vacation</button>
        </label>
    </form>
    <br><br><br> <!--  the breaks make the page long enough so the calendar drops down instead of up, which is better for us! -->
</div>

</body>
</html>