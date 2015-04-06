<?php
    require("config.php");
    if(empty($_SESSION['user']))
    {
        header("Location: index.php");
        die("Redirecting to index.php");
    }
?>
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
    <body>

   <h3> Use this form to enter/edit information for the selected day. (select day id is <?php echo htmlentities($_SESSION['currentVacationPlanId'], ENT_QUOTES, 'UTF-8'); ?>)  </h3> <br> <br>

        StartingLocation:  <input name="StartingLocation" size="15" type="text" />  <br><br>
        EndingLocation : <input name="EndingLocation" size="15" type="text" />  <br><br>

        <br><br>

        morningActivity : <TEXTAREA NAME="morningActivity" ROWS=3 COLS=30 > </TEXTAREA>
        <option> RED (reservations not made/confirmed)</option>
        <option> GREEN (reservations confirmed)</option>
        <option> YELLOW (no reservations needed) </option>
        <br><br>
        afternoonActivity: <TEXTAREA NAME="afternoonActivity" ROWS=3 COLS=30 > </TEXTAREA>
        <option> RED (reservations not made/confirmed)</option>
        <option> GREEN (reservations confirmed)</option>
        <option> YELLOW (no reservations needed) </option>
        <br><br>
        eveningActivity : <TEXTAREA NAME="eveningActivity" ROWS=3 COLS=30 > </TEXTAREA>
        <option> RED (reservations not made/confirmed)</option>
        <option> GREEN (reservations confirmed)</option>
        <option> YELLOW (no reservations needed) </option>
        <br><br>
        lodging : <TEXTAREA NAME="lodging" ROWS=3 COLS=30 > </TEXTAREA>  <br><br>
        <option> RED (reservations not made/confirmed)</option>
        <option> GREEN (reservations confirmed)</option>
        <option> YELLOW (no reservations needed) </option>
        </br> </br></br>

        </br> </br>
        <input name="Submit" type="submit" value="Submit" />
        <?php
        // put your code here
        ?>
    </body>
</div>
</html>
