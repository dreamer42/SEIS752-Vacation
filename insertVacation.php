<?php
require("config.php");
?>
<?php
$name = $_GET['name'];

$query = "
            INSERT INTO vacations
                (`user_id`, `name`)
            VALUES
                (:user_id, :name)
        ";
$query_params = array(
    ':user_id' => $_SESSION['user']['user_id'],
    ':name' => $name
);

try{
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }

echo $db->lastInsertId('vacation_id');

?>
