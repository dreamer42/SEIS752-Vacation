<?php
require("config.php");
?>

  <?php
    $vacationPlanId = $_SESSION['currentVacationPlanId'];
    $startingLocation = $_GET['startingLocation'];
    $endingLocation = $_GET['endingLocation'];
    $morningActivity = $_GET['morningActivity'];
    $afternoonActivity = $_GET['afternoonActivity']; 
    $eveningActivity = $_GET['eveningActivity'];
    $lodging = $_GET['lodging']; 
    $morningStatus = $_GET['morning_status'];
    $afternoonStatus = $_GET['afternoon_status'];
    $eveningStatus = $_GET['evening_status'];
    $lodgingStatus = $_GET['lodging_status'];

    $colorQuery = "
        SELECT
          HEXcolor,
          status_id
        FROM status_def
    ";
    try{
        $colorStmt = $db->prepare($colorQuery);
        $colorResult = $colorStmt->execute();
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
    $colorArray = array();
    while($colorRow = $colorStmt->fetch()){
        $colorArray[$colorRow['HEXcolor']] = $colorRow['status_id'];
    }

    $query = "
        UPDATE  `vacation_plan` 
        SET `starting_location` =  '".$startingLocation."',
            `ending_location` =  '".$endingLocation."',
            `morning` =  '".$morningActivity."',
            `morning_status` =  '".$morningStatus."',    
            `afternoon` =  '".$afternoonActivity."',
            `afternoon_status` =  '".$afternoonStatus."',
            `evening` =  '".$eveningActivity."',
            `evening_status` =  '".$eveningStatus."',  
            `lodging` = '".$lodging."', 
            `lodging_status` =  '".$lodgingStatus."'
        WHERE vacation_plan_id = '".$vacationPlanId."'"; 
    //echo $query;
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute(); 
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
    header( "Location: http://localhost/vacation/vacationSummary.php");
  
    ?>
  