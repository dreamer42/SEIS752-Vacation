<?php
require("config.php");
ini_set('display_errors', 'on'); error_reporting(-1);
echo '$_SESSION[currentVacationPlanId] =    '; echo $_SESSION['currentVacationPlanId']; echo '</br>';
?>
<!DOCTYPE html>
     <head>
        <title>fetchVacationRow Page</title>
    </head>
<?php
 'echo "in fetchVacationRow")';
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
echo '$query = '; echo $query;  echo '</br></br>';
//echo '$query_params = '; echo $query_params;  echo '</br></br>';
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
       
    while($row = $stmt->fetch()){
       //echo $row['ending_location'];
      // document.getElementById("endingLocation").html = $row['ending_location'];
      
       echo $row['vacation_plan_id'];echo'  '; echo $row['vacation_id'];echo'  ';echo $row['row_number'];echo '</br>';
       echo $row['day_date'];echo'  '; echo $row['travel_time'];echo'  ';echo $row['starting_location'];echo '</br>'; 
       echo $row['ending_location'];echo'  '; echo $row['morning'];echo'  ';echo $row['morning_status'];echo '</br>';  
       echo $row['afternoon'];echo'  '; echo $row['afternoon_status'];echo'  ';echo $row['evening'];echo '</br>';  
       echo $row['evening_status'];echo'  '; echo $row['lodging'];echo'  ';echo $row['lodging_status'];echo '</br>';  

    }
       
    /* 
      if (!($result = mysql_query($query,$connection))) {
        die("Error at mysql_query");    
    print("<TABLE BORDER>\n");
    printf("<TR><TD>ID</TD><TD>senderID</TD><TD>message</TD><TD>timeStamp</TD><TD>receiverID</TD></TR>\n");
    while ($row = mysql_fetch_array($result)) {
        printf ("<TR><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD></TR>\n", $row[0], $row[1], $row[2], $row[3], $row[4]);
    }
    printf("</TABLE>\n");
    mysql_free_result($result);
  */
    
    ?>
</html>