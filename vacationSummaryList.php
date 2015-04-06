<?php
require("config.php");
?>

    <?php

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
                vacation_id = :vacation_id
        ";
    $query_params = array(
        ':vacation_id' => $_SESSION['currentVacationId']
    );

    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
    echo '<table class="table table-bordered table-hover">';
    echo '<thead><tr><td>Day</td><td>Date</td><td>Travel Time</td><td>Start</td><td>End</td><td>Morning</td><td>Afternoon</td><td>Evening</td><td>Lodging</td></tr></thead>';
    echo '<tbody>';
    while($row = $stmt->fetch()){
        echo '<tr>';
        echo '<td>'.$row['row_number'].'</td>';
        echo '<td>'.$row['day_date'].'</td>';
        echo '<td>'.$row['travel_time'].'</td>';
        echo '<td>'.$row['starting_location'].'</td>';
        echo '<td>'.$row['ending_location'].'</td>';
        echo '<td>'.$row['morning'].'</td>';
        echo '<td>'.$row['afternoon'].'</td>';
        echo '<td>'.$row['evening'].'</td>';
        echo '<td>'.$row['lodging'].'</td>';
        echo '<td><a href="enterDayDetails.php"><button type="button" onClick="setCurrentVacationPlanId(\'' . $row['vacation_plan_id'] . '\')">Details</a></button></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    ?>
