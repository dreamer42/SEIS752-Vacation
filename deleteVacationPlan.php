<?php
require("config.php");
?>
<?php
$vacationPlanId = $_GET['vacationPlanId'];
echo  'yo ' + $vacationPlanId;

// get details about row about to be deleted

$query = "
            SELECT
                vacation_id,
                row_number
            FROM
                vacation_plan
            WHERE
                vacation_plan_id = :vacationPlanId
        ";
$query_params = array(
    ':vacationPlanId' => $vacationPlanId
);
try{
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
$row = $stmt->fetch();
$vacationId = $row['vacation_id'];
$rowNumber = $row['row_number'];

echo  'yo ' + $vacationId;
echo  'yo ' + $rowNumber;



// delete the row

$query = "
            DELETE FROM vacation_plan
            WHERE vacation_plan_id = :vacation_plan_id
        ";
$query_params = array(
    ':vacation_plan_id' => $vacationPlanId,
);

try{
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }


// move other days up to remove the gap

$query = "
            UPDATE
                vacation_plan
            SET
                row_number = row_number - 1,
                day_date = DATE_ADD( day_date,INTERVAL -1 DAY)
            WHERE
                vacation_id = :vacationId
                and row_number > :rowNumber
        ";
$query_params = array(
    ':vacationId' => $vacationId,
    ':rowNumber' => $rowNumber
);
try{
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }

?>
