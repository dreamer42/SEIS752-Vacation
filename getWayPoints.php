<?php
require("config.php");
?>
<?php
$vacationId = $_SESSION['currentVacationId'];

$return_arr = array();

// Get just ending location for first day (starting location covered by origin)
$query = "

            SELECT
                ending_location
            FROM
                vacation_plan
            WHERE
                vacation_id = :vacationId
                and row_number in
                	(select MIN(row_number) FROM
                        vacation_plan
                        WHERE
                        vacation_id = :vacationId
                    )
        ";
$query_params = array(
    ':vacationId' => $vacationId
);
try{
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }

while ($row = $stmt->fetch()) {
    $field['wayPoint'] = $row['ending_location'];
    array_push($return_arr,$field);
}

// Get both the starting and ending locations for middle days
$query = "

            SELECT
                starting_location, ending_location
            FROM
                vacation_plan
            WHERE
                vacation_id = :vacationId
                and row_number not in
                	(select MIN(row_number) FROM
                        vacation_plan
                        WHERE
                        vacation_id = :vacationId
                    )
                and row_number not in
                	(select MAX(row_number) FROM
                        vacation_plan
                        WHERE
                        vacation_id = :vacationId
                    )

        ";
$query_params = array(
    ':vacationId' => $vacationId
);
try{
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }

while ($row = $stmt->fetch()) {
    $field['wayPoint'] = $row['starting_location'];
    array_push($return_arr,$field);
    $field['wayPoint'] = $row['ending_location'];
    array_push($return_arr,$field);
}

// Get just beginning location for last day (ending location covered by destination)
$query = "
            SELECT
                starting_location
            FROM
                vacation_plan
            WHERE
                vacation_id = :vacationId
                and row_number in
                	(select MAX(row_number) FROM
                        vacation_plan
                        WHERE
                        vacation_id = :vacationId
                    )
        ";
$query_params = array(
    ':vacationId' => $vacationId
);
try{
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }

while ($row = $stmt->fetch()) {
    $field['wayPoint'] = $row['starting_location'];
    array_push($return_arr,$field);
}

echo json_encode($return_arr);

?>
