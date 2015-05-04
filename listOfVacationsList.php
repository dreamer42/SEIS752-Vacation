<?php
require("config.php");
?>
    <?php

    $query = "
            SELECT
                user_id,
                vacation_id,
                name
            FROM vacations
            WHERE
                user_id = :user_id
        ";
    $query_params = array(
        ':user_id' => $_SESSION['user']['user_id']
    );

    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }

    echo '<table class="table table-hover">';
    echo '<tbody>';
    while($row = $stmt->fetch()){
        echo '<tr>';
        echo '<td width="30"><button class="btn btn-danger btn-small" onClick="deleteVacation(\'' . $row['vacation_id'] . '\')"  style="margin-right: 30px" ><i class="icon-white icon-trash"></i></button></td>';
        if(empty($row['name'])){
            echo '<td><a href="vacationSummary.php" onClick="setCurrentVacationId(\'' . $row['vacation_id'] . '\')" />UNNAMED VACATION</td>';
        }else{
            echo '<td><a href="vacationSummary.php" onClick="setCurrentVacationId(\'' . $row['vacation_id'] . '\')" />'.$row['name'].'</td>';
        }
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    ?>