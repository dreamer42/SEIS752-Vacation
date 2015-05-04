<?php
require("config.php");
ini_set('display_errors', 'on'); error_reporting(-1);

?>
<?php
 // 'echo "in fetchVacationRow")';
        $colorQuery = "
            SELECT
              status_id,
              HEXcolor
            FROM status_def
            WHERE status_id = :status_id
        ";
        $query_params = array(
        ':status_id' => $_GET['status_id']
    );
    try{
        $colorStmt = $db->prepare($colorQuery);
        $colorResult = $colorStmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
    $colorArray = array();
    
     while($row = $colorStmt->fetch()){
     // $colorArray[] = $row; //array_map('uft8_encode', $row );
     $colorArray[(string)$row['status_id']] = $row['HEXcolor']; 
     }  
    echo json_encode($colorArray); // ($resultArray);  //we send the array as JSON object

    ?>