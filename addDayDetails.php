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
    /*
    $query_params = array(
        ':user_id' => $_SESSION['user']['user_id']
    );

    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
     
     * 
     * <?php

"UPDATE tablename 
SET column1name = '".$new_value1."', 
    column2name = '".$new_value2."', 
    column3name = '".$new_value3."' 
WHERE columnname = '".$value."'
    
     * 
     * 
    */
 //   while($row = $stmt->fetch()){
 //       echo '<li><a href="vacationSummary.php" onClick="setCurrentVacationId(\'' . $row['vacation_id'] . '\')" />'.$row['name'];
 //       echo "</li>";
 //   }

    ?>

<head> </head>
<body> 
    <h2> DISPLAY SOMETHING </h2>
</body>
  


