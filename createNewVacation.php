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
                        data: { vacationId: vacationId, rowNumber: 1 }
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
    <script src="libs/bootstrap.min.js"></script>
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

<div class="container hero-unit">
    <h2>Coming soon, the ability to create new vacations!</h2>
    <form id="newVacation" name="newVacation" method="get" >
        <label>Vacation Name:
            <input type="text" name="vacationName" id="vacationName" value="" />
        </label>
        <label>
            <button type="button" onclick="createNewVacation()">Create Vacation</button>
        </label>
    </form>
</div>

</body>
</html>