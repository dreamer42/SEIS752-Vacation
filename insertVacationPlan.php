<?php
require("config.php");
?>
<?php
$vacation_id = $_GET['vacationId'];
$row_number = $_GET['rowNumber'];
$day_date = $_GET['dayDate'];
$starting_location = $_GET['startingLocation'];

$query = "
            INSERT INTO vacation_plan
                (`vacation_id`, `row_number`, `day_date`, `starting_location`)
            VALUES
                (:vacation_id, :row_number, :day_date, :starting_location )
        ";
$query_params = array(
    ':vacation_id' => $vacation_id,
    ':row_number' => $row_number,
    ':day_date' => $day_date,
    ':starting_location' => $starting_location
);

try{
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }

echo $db->lastInsertId('vacation_plan_id');

?>
