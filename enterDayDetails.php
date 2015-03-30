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
        <title>EnterDayData </title>
    </head>
    <body>    <h3> navigation links </h3>
        <ul class="tabs" data-tab>
          <li class="tab-title active"><a href="index.php">Tab IndexPage</a></li>
          <li class="tab-title active"><a href="#">Tab EnterDayDetails</a></li
      </ul>

   <h3> Use this form to enter/edit information for the selected day.  </h3> <br> <br>
   <body>
  
        StartingLocation:  <input name="StartingLocation" size="15" type="text" />  <br><br>
        EndingLocation : <input name="EndingLocation" size="15" type="text" />  <br><br>

        </br> </br>

        morningActivity : <TEXTAREA NAME="morningActivity" ROWS=3 COLS=30 > </TEXTAREA>  
        <option> RED (reservations not made/confirmed)</option>
        <option> GREEN (reservations confirmed)</option>
        <option> YELLOW (no reservations needed) </option> 
        <br><br>
        afternoonActivity: <TEXTAREA NAME="afternoonActivity" ROWS=3 COLS=30 > </TEXTAREA> 
        <option> RED (reservations not made/confirmed)</option>
        <option> GREEN (reservations confirmed)</option>
        <option> YELLOW (no reservations needed) </option> 
        <br><br>
        eveningActivity : <TEXTAREA NAME="eveningActivity" ROWS=3 COLS=30 > </TEXTAREA>
        <option> RED (reservations not made/confirmed)</option>
        <option> GREEN (reservations confirmed)</option>
        <option> YELLOW (no reservations needed) </option> 
        <br><br>
        lodging : <TEXTAREA NAME="lodging" ROWS=3 COLS=30 > </TEXTAREA>  <br><br>
        <option> RED (reservations not made/confirmed)</option>
        <option> GREEN (reservations confirmed)</option>
        <option> YELLOW (no reservations needed) </option> 
        </br> </br></br>

        </br> </br>
        <input name="Submit" type="submit" value="Submit" />
        <?php
        // put your code here
        ?>

   </body>
</html>
