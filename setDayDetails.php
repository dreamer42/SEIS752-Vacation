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
    $morningStatus = $_GET['morningStatus'];
    
    $query = "
        UPDATE  `vacation_plan` 
        SET `starting_location` =  '".$startingLocation."',
            `ending_location` =  '".$endingLocation."',
            `morning` =  '".$morningActivity."',
            `afternoon` =  '".$afternoonActivity."',
            `evening` =  '".$eveningActivity."',
            `lodging` = '".$lodging."' 
        WHERE vacation_plan_id = '".$vacationPlanId."'"; 

    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute(); 
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
    header( "Location: http://localhost/vacation/vacationSummary.php");