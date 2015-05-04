<?php
  	require('config.php');
    $submitted_user_name = '';
    if(!empty($_POST)){
        $query = "
            SELECT
                user_id,
                user_name,
                first_name,
                last_name,
                password,
                salt,
                email
            FROM users
            WHERE
                user_name = :user_name
        ";
        $query_params = array(
            ':user_name' => $_POST['user_name']
        );

        try{
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
        $login_ok = false;
        $row = $stmt->fetch();
        if($row){
            $check_password = hash('sha256', $_POST['password'] . $row['salt']);
            for($round = 0; $round < 65536; $round++){
                $check_password = hash('sha256', $check_password . $row['salt']);
            }
            if($check_password === $row['password']){
                $login_ok = true;
            }
        }

        if($login_ok){
            unset($row['salt']);
            unset($row['password']);
            $_SESSION['user'] = $row;
            header("Location: welcome.php");
            die("Redirecting to: welcome.php");
        }
        else{
            // adding space so it displays below top black bar
            print("<html>");
            print("<div class=\"container hero-unit\">");
            print("<h1>Login Failed!</h1>");
            print("</div>");
            print("</html>");
            $submitted_username = htmlentities($_POST['user_name'], ENT_QUOTES, 'UTF-8');
        }
    }
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Vacation</title>
    <meta name="description" content="Vacation">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>
    <script src="libs/bootbox.min.js"></script>
    <link href="libs/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
        body { background: url(images/bglight.png); }
        .hero-unit { background-color: #fff; }
        .center { display: block; margin: 0 auto; }
    </style>
            <script language="javascript" type="text/javascript">
              var clipIndex;
        //    function playSound(soundfile) {
         //     document.getElementById("dummy").innerHTML=
         //       "<embed src=\""+soundfile+"\" hidden=\"true\" autostart=\"true\" loop=\"false\" />";
         //   }
             function playSound() {
                 var clips = [ 'MinivanClip_1.mp3', 'MinivanClip_2.mp3', 'MinivanClip_3.mp3', 'MinivanClip_4.mp3','DogHowl.mp3' ];
                 var randomIndex = Math.floor(Math.random() * clips.length);
                 var soundfile = clips[randomIndex];
                 document.getElementById("dummy").innerHTML=
                    "<embed src=\"sound/"+soundfile+"\" hidden=\"true\" autostart=\"true\" loop=\"false\" />";
            }
            </script>
</head>

<body>

<div class="navbar navbar-fixed-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a href="index.php" class="brand">Vacation</a>
      <div class="nav-collapse collapse">
        <ul class="nav pull-right">
          <li><a href="register.php">Register</a></li>
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Log In <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                <form action="index.php" method="post">
                    Username:<br />
                    <input type="text" name="user_name" value="<?php echo $submitted_user_name; ?>" />
                    <br /><br />
                    Password:<br />
                    <input type="password" name="password" value="" />
                    <br /><br />
                    <input type="submit" class="btn btn-primary" value="Login" />
                </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!--<div id="TheListOfVacations" class="container hero-unit"></div>-->


<div class="container hero-unit">
    <h1>Welcome to SEIS752 Vacation</h1>
    <p>There are great things to see, but you can't access it just yet!</p>
    <h2>Either login or register</h2>
    <ul>
        <li>If you have credentials, just login from the toolbar</li>
        <li>If you're new to the site, please register from the toolbar</li>
    </ul>
    <span id="dummy"></span>
    <p onclick="playSound();"><img src="images/familyCarVacation.png" alt="" class="center" /></p>  <!-- onmouseover="playSound();"  -->
</div>

</body>
</html>


<!-- Examples for setting up pretty login and registration pages found at http://untame.net/2013/06/how-to-build-a-functional-login-form-with-php-twitter-bootstrap/  written by Michael Milstead / Mode87.com for Untame.net Bootstrap Tutorial, 2013
	 These page were used as a starting point on setting these pages update and were modified to meet our project needs.
-->