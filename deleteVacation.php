<?php
require("config.php");
?>
<?php
$vacationId = $_GET['vacationId'];

// delete all the days in the vacation

$query = "
            DELETE FROM vacation_plan
            WHERE vacation_id = :vacation_id
        ";
$query_params = array(
    ':vacation_id' => $vacationId,
);

try{
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }

// delete vacation

$query = "
            DELETE FROM vacations
            WHERE vacation_id = :vacation_id
        ";
$query_params = array(
    ':vacation_id' => $vacationId,
);

try{
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }

?>
