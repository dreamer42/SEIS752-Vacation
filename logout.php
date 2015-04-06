<?php 
    require("config.php");
    unset($_SESSION['user']);
    unset($_SESSION['currentVacationId']);
    unset($_SESSION['currentVacationPlanId']);
    header("Location: index.php");
    die("Redirecting to: index.php");
?>