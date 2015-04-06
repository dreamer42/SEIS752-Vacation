<?php
require("config.php");
?>
<ol>
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
    while($row = $stmt->fetch()){
        echo '<li><a href="vacationSummary.php" onClick="setCurrentVacationId(\'' . $row['vacation_id'] . '\')" />'.$row['name'];
        echo "</li>";
    }

    ?>
</ol>