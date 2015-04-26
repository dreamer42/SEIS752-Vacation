<?php
require("config.php");
?>
<?php
$vacationId = $_GET['vacationId'];


$query = "
            SELECT
                row_number+1 as NEXT_ROW_NUMBER,
                DATE_ADD( day_date,INTERVAL 1 DAY) AS NEXT_DAY_DATE,
                ending_location as NEXT_STARTING_LOCATION
            FROM
                vacation_plan
            WHERE
                vacation_id = :vacationId
                and row_number =
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
$row = $stmt->fetch();

$data = array();
$data['NEXT_ROW_NUMBER'] = $row['NEXT_ROW_NUMBER'];
$data['NEXT_DAY_DATE'] = $row['NEXT_DAY_DATE'];
$data['NEXT_STARTING_LOCATION'] = $row['NEXT_STARTING_LOCATION'];
echo json_encode($data);

?>
