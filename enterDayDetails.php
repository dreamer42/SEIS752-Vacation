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
    
    <script type="text/javascript">  //language="javascript" 
    function addtext() { 
        //www.mediacollege.com/internet/javascript/form/add-text.html
        //var newtext = "some newtext";
        var newtext = document.myform.morningActivity.value ;
        alert( newtext);
       // document.myform.morningActivity.value = newtext;
        //enterDayDetails.myform.morningActivity.value = "some newtext";
       // document.forms['myform'].elements['morningActivity'].value = txt;
      // this.form.elements["morningActivity"].value = 'Some Value';
    }
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
          <!--<li><a href="register.php">Register</a></li>-->
          <li class="divider-vertical"></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!--  <div class="container hero-unit" id="divX">  
    <body>  -->

   <h3> Use this form to enter/edit information for the selected day. (select day id is <?php echo htmlentities($_SESSION['currentVacationPlanId'], ENT_QUOTES, 'UTF-8'); ?>)  </h3> <br> <br>
    <form name="myForm" id="myForm">  
        StartingLocation: <input id="startingLocation" name="startingLocation" size="15" type="text" />  <br><br>
        EndingLocation : <input id="endingLocation"  name="endingLocation" size="15" type="text" />  <br><br>

        <br><br>

        morningActivity : <textarea  id="morningActivity" name="morningActivity" ROWS=3 COLS=30 >Wake Up </textarea >

        <br><br>
        afternoonActivity: <textarea  id="afternoonActivity" name="afternoonActivity" ROWS=3 COLS=30 > {{article}}</textarea >

        <br><br>
        eveningActivity : <textarea  id="eveningActivity" name="eveningActivity"  ROWS=3 COLS=30 >ABC </textarea >

        <br><br>
        lodging : <textarea  id="lodging" name="lodging" ROWS=3 COLS=30 > </textarea >  <br><br>
        <option> RED (reservations not made/confirmed)</option>
        <option> GREEN (reservations confirmed)</option>
        <option> YELLOW (no reservations needed) </option>
        
        </br> </br>
     
        <!--     <input name="submit"  id="submit" type="button"  value="Submit"   />  -->
      <input name="Submit" type="submit" value="Submit" onclick="addtext();"/>  
     </form>
   
      <form action="fetchVacationRow.php" method="POST"> 
           rowID: <input id="fetchRow"  name="fetchRow"  type="text" value="FetchRow"  />  <br><br>
         <input type="submit" value="Submit"/> 
      </form>      

    </body>
<!-- </div>  -->
</html>
