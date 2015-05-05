<?php
// require("config.php");
?>

<?php

$startingLocation = $_POST['startingLocation'];

echo '$startingLocation =' ;  echo $startingLocation;  echo '</br>';
$query = "
    INSERT  `vacation_plan` SET
    ( --`vacation_plan_id`,
    `vacation_id` = NEWVAL,
    `row_number` = NEWVAL,
    `day_date` = NEWVAL,
    `travel_time` = NEWVAL,
    `starting_location` = NEWVAL,
    `ending_location` = NEWVAL,
    `morning` = NEWVAL,
    `morning_status` = NEWVAL,
    `afternoon` = NEWVAL,
    `afternoon_status` = NEWVAL,
    `evening` = NEWVAL,
    `evening_status` = NEWVAL,
    `lodging` = NEWVAL,
    `lodging_status` = NEWVAL)
    ";
echo '$query =    ' ;  echo $query;

?>

<head> </head>
<body> 
    <h2> DISPLAY SOMETHING </h2>
</body>
  


