<?php
require("config.php");
?>
<?php
$vacation_id = $_GET['vacationId'];
$row_number = $_GET['rowNumber'];

$query = "
            INSERT INTO vacation_plan
                (`vacation_id`, `row_number`)
            VALUES
                (:vacation_id, :row_number)
        ";
$query_params = array(
    ':vacation_id' => $vacation_id,
    ':row_number' => $row_number
);

try{
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }

echo $db->lastInsertId('vacation_plan_id');

?>
