<?php
require("config.php");
?>
<?php
$vacationId = $_SESSION['currentVacationId'];

$query = "
            SELECT
                starting_location, ending_location, travel_time, travel_distance, day_date
            FROM
                vacation_plan
            WHERE
                vacation_id = :vacationId
        ";
$query_params = array(
    ':vacationId' => $vacationId
);
try{
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }

$return_arr = array();

while ($row = $stmt->fetch()) {
    $row_array['starting_location'] = $row['starting_location'];
    $row_array['ending_location'] = $row['ending_location'];
    $row_array['travel_time'] = $row['travel_time'];
    $row_array['travel_distance'] = $row['travel_distance'];
    $row_array['day_date'] = $row['day_date'];

    array_push($return_arr,$row_array);
}

echo json_encode($return_arr);

?>
