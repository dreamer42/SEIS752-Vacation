<?php session_start();
    if ( !is_writable(session_save_path()) ) {
       echo 'Session save path "'.session_save_path().'" is not writable!'; 
    }
    ini_set('display_errors', 'on'); error_reporting(-1);
     ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    <h3> navigation links </h3>
        <ul class="tabs" data-tab>
          <li class="tab-title active"><a href="#">Tab IndexPage</a></li>
          <li class="tab-title"><a href="enterDayDetails.php">Tab EnterDayDetails</a></li
      </ul>
        <?php
        // put your code here
        ?>
    </body>
</html>
