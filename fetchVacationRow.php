<?php
require("config.php");
ini_set('display_errors', 'on'); error_reporting(-1);

?>
<?php
 // 'echo "in fetchVacationRow")';
     
        $colorQuery = "
            SELECT
              status_id,
              HEXcolor
            FROM status_def
        ";
    try{
        $colorStmt = $db->prepare($colorQuery);
        $colorResult = $colorStmt->execute();
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
    $colorArray = array();
        while($colorRow = $colorStmt->fetch()){
        $colorArray[(string)$colorRow['status_id']] = $colorRow['HEXcolor'];
    }
       // $colorArray[$row['morning_status']] 
 
   $query = "
            SELECT
                vacation_plan_id,
                vacation_id,
                row_number,
                day_date,
                travel_time,
                starting_location,
                ending_location,
                morning,
                morning_status,
                afternoon,
                afternoon_status,
                evening,
                evening_status,
                lodging,
                lodging_status
            FROM vacation_plan
            WHERE
                vacation_plan_id = :vacationPlanId
        ";
    $query_params = array(
        ':vacationPlanId' => $_SESSION['currentVacationPlanId']
    );

    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }

      $resultArray = array(); 
    while($row = $stmt->fetch()){
      $resultArray[] = $row; //array_map('uft8_encode', $row );
 /*
       echo $row['vacation_plan_id'];echo'  '; echo $row['vacation_id'];echo'  ';echo $row['row_number'];echo '</br>';
       echo $row['day_date'];echo'  '; echo $row['travel_time'];echo'  ';echo $row['starting_location'];echo '</br>'; 
       echo $row['ending_location'];echo'  '; echo $row['morning'];echo'  ';echo $row['morning_status'];echo '</br>';  
       echo $row['afternoon'];echo'  '; echo $row['afternoon_status'];echo'  ';echo $row['evening'];echo '</br>';  
       echo $row['evening_status'];echo'  '; echo $row['lodging'];echo'  ';echo $row['lodging_status'];echo '</br>'; 
 */   
    }
    $nameQuery = "SELECT name 
                   FROM `vacations` 
                   WHERE vacation_id = 2
                 ";
    try{
        $nameStmt = $db->prepare($nameQuery);
        $nameResult = $nameStmt->execute();
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
    $nameArray = array();
        while($nameRow = $nameStmt->fetch()){
        $nameArray["vacation_id"] = $nameRow['name'];
    }
    
    $data = array();
    $data['statusDef'] = $colorArray;
    $data['vcationPlan'] = $resultArray;
    $data['vacationName'] = $nameArray;
     echo json_encode($data); // ($resultArray);  //we send the array as JSON object
       /*  http://stackoverflow.com/questions/22104811/return-json-object-from-mysql-query-using-json-encode
        *  $encode = array();

            while($row = mysqli_fetch_assoc($result)) {
               $encode[$row['question _text']][] = $row['answer_text'];
            }

            echo json_encode($encode);
        */
    
    ?>
