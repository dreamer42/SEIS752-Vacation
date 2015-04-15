<?php
require("config.php");
ini_set('display_errors', 'on'); error_reporting(-1);
?>
<!DOCTYPE html>
     <head>
        <title>setDayDetails Page</title>
    </head>
    <?php
   // $startingLocation = $_POST['startingLocation'];
   // $_SESSION['currentVacationPlanId'] = $_GET['vacationPlanId'];
    
    $vacationPlanId = $_SESSION['currentVacationPlanId'];
    $startingLocation = $_GET['startingLocation'];
    $endingLocation = $_GET['endingLocation'];
    $morningActivity = $_GET['morningActivity'];
    $afternoonActivity = $_GET['afternoonActivity']; 
    $eveningActivity = $_GET['eveningActivity'];
    $lodging = $_GET['eveningActivity']; 
    ECHO '$vacationPlanId= ' ; ECHO $vacationPlanId; 
    // UPDATE `vacation_plan` SET morning = 'eat pancakes' WHERE vacation_plan_id =14
  
    
    
   echo '$startingLocation =' ;  echo $startingLocation;  echo '</br>';
    $query = "
        UPDATE  `vacation_plan` 
        SET `starting_location` =  '".$startingLocation."',
            `ending_location` =  '".$endingLocation."',
            `morning` =  '".$morningActivity."',
            `afternoon` =  '".$afternoonActivity."',
            `evening` =  '".$eveningActivity."', 
        WHERE vacation_plan_id '".$vacationPlanId."'"; 
          
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
     
    */
 //   while($row = $stmt->fetch()){
 //       echo '<li><a href="vacationSummary.php" onClick="setCurrentVacationId(\'' . $row['vacation_id'] . '\')" />'.$row['name'];
 //       echo "</li>";
 //   }

    ?>


<body> 
    <h2> DISPLAY SOMETHING </h2>
</body>
  

</html>
