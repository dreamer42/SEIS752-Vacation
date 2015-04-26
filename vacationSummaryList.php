<?php
require("config.php");
?>

    <?php

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
        $colorArray[$colorRow['status_id']] = $colorRow['HEXcolor'];
    }

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
            WHERE vacation_id = :vacation_id
            ORDER BY row_number
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
    echo '<thead><tr><td></td><td>Day</td><td>Date</td><td>Travel Time</td><td>Start</td><td>End</td><td>Morning</td><td>Afternoon</td><td>Evening</td><td>Lodging</td></tr></thead>';
    echo '<tbody>';
    while($row = $stmt->fetch()){
        echo '<tr>';
        echo '<td><button class="btn btn-danger btn-small" onClick="deleteDay(\'' . $row['vacation_plan_id'] . '\')" ><i class="icon-white icon-trash"></i></button></td>';
        echo '<td>'.$row['row_number'].'</td>';
        echo '<td>'.$row['day_date'].'</td>';
        echo '<td>'.$row['travel_time'].'</td>';
        echo '<td>'.$row['starting_location'].'</td>';
        echo '<td>'.$row['ending_location'].'</td>';
        echo '<td bgcolor=\''.$colorArray[$row['morning_status']].'\'">'.$row['morning'].'</td>';
        echo '<td bgcolor=\''.$colorArray[$row['afternoon_status']].'\'">'.$row['afternoon'].'</td>';
        echo '<td bgcolor=\''.$colorArray[$row['evening_status']].'\'">'.$row['evening'].'</td>';
        echo '<td bgcolor=\''.$colorArray[$row['lodging_status']].'\'">'.$row['lodging'].'</td>';
        echo '<td><button class="btn btn-primary btn-small" onClick="redirectToEnterDayDetails(\'' . $row['vacation_plan_id'] . '\')" ><i class="icon-white icon-zoom-in"></i></button></td>';
        echo '</tr>';
    }
    echo '<tr><td colspan="10"></td><td><button class="btn btn-primary btn-small" onClick="addNewDay(\'' . $row['vacation_plan_id'] . '\')" ><i class="icon-white icon-plus"></i></button></td></tr>';
    echo '</tbody>';
    echo '</table>';

    ?>
