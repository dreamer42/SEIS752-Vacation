<?php
require("config.php");
?>
<?php
$vacationId = $_SESSION['currentVacationId'];

$query = "
            SELECT
                starting_location
            FROM
                vacation_plan
            WHERE
                vacation_id = :vacationId
                and row_number =
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
$row = $stmt->fetch();
echo $row['starting_location'];
?>
