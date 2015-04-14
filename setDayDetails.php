<?php
// require("config.php");
?>

    <?php
/*   DELETE FROM `vacation_plan` WHERE `starting_location` = 'AAstart'  LIMIT 1   */
    $startingLocation = $_POST['startingLocation'];
    
   echo '$startingLocation =' ;  echo $startingLocation;  echo '</br>';
    $query = "
        INSERT INTO `vacation_plan` 
        ( --`vacation_plan_id`,
        `vacation_id`,
        `row_number`,
        `day_date`,
        `travel_time`,
        `starting_location`,
        `ending_location`,
        `morning`,
        `morning_status`,
        `afternoon`,
        `afternoon_status`,
        `evening`,
        `evening_status`,
        `lodging`,
        `lodging_status`)
        VALUES
        (            -- `vacation_plan_id`,  want auto fill
        2,             -- `vacation_id`,  2 = john
        4,             -- `row_number`,  change to auto fill later
        '2014-09-09',  -- `day_date`,
        '9',           --  `travel_time`,
        'AAstart',        -- `starting_location`,
        'BBend',           -- `ending_location`,
        'CC morning',  -- `morning`,   
        4,                  -- `morning_status`,
        'EE afternoon',   -- `afternoon`,
        4,           -- `afternoon_status`,
        'GG evening',   --  `evening`,
        4,    -- `evening_status`,
        'II lodging',      -- `lodging`,
        3)      -- `lodging_status`);
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
  
