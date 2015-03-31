// TODO: create "config.php" with your own database settings where the 4 blank values are below:
<?php

    // These variables define the connection information for your MySQL database
    $db_user_name = "";
    $password = "";
    $host = "";
    $db_name = "";

    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    try { $db = new PDO("mysql:host={$host};dbname={$db_name};charset=utf8", $db_user_name, $password, $options); }
    catch(PDOException $ex){ die("Failed to connect to the database: " . $ex->getMessage());}
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    header('Content-Type: text/html; charset=utf-8');
    session_start();
?>