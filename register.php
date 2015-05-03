<?php
require("config.php");
if (!empty($_POST)) {
    // Ensure that the user fills out fields
    if (empty($_POST['user_name'])) {
        die("Please enter a user_name.");
    }
    if (empty($_POST['password'])) {
        die("Please enter a password.");
    }
    if ((!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) && strlen($_POST['email']) > 0) {
        die("Invalid E-Mail Address");
    }

    // Check if the user name is already taken
    $query = "
            SELECT
                1
            FROM users
            WHERE
                user_name = :user_name
        ";
    $query_params = array(':user_name' => $_POST['user_name']);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }
    $row = $stmt->fetch();
    if ($row) {
        die("This user name is already in use");
    }
    /* - TODO : do we want to prevent multiple logins from same email?  I don't think we need to, but should discuss.
    $query = "
        SELECT
            1
        FROM users
        WHERE
            email = :email
    ";
    $query_params = array(
        ':email' => $_POST['email']
    );
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());}
    $row = $stmt->fetch();
    if($row){ die("This email address is already registered"); }
    */

    // Add row to database
    $query = "
            INSERT INTO users (
                user_name,
                first_name,
                last_name,
                password,
                salt,
                email
            ) VALUES (
                :user_name,
                :first_name,
                :last_name,
                :password,
                :salt,
                :email
            )
        ";

    // Security measures
    $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
    $password = hash('sha256', $_POST['password'] . $salt);
    for ($round = 0; $round < 65536; $round++) {
        $password = hash('sha256', $password . $salt);
    }
    $query_params = array(
        ':user_name' => $_POST['user_name'],
        ':first_name' => $_POST['first_name'],
        ':last_name' => $_POST['last_name'],
        ':password' => $password,
        ':salt' => $salt,
        ':email' => $_POST['email']
    );
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }
    header("Location: index.php");
    die("Redirecting to index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootstrap Tutorial</title>
    <meta name="description" content="Bootstrap Tab + Fixed Sidebar Tutorial with HTML5 / CSS3 / JavaScript">
    <meta name="author" content="Untame.net">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>
    <link href="libs/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
        body {
            background: url(images/bglight.png);
        }

        .hero-unit {
            background-color: #fff;
        }

        .center {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>body

<div class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a href="index.php" class="brand">Vacation</a>
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    <li><a href="index.php">Return Home</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container hero-unit">
    <h1>Register</h1> <br/><br/>

    <form action="register.php" method="post">
        <label>First Name: </label>
        <input type="text" name="first_name" value=""/>
        <label>Last Name: </label>
        <input type="text" name="last_name" value=""/>
        <label>Username: <strong style="color:darkred;">*</strong></label>
        <input type="text" name="user_name" value=""/>
        <label>Email: </label>
        <input type="text" name="email" value=""/>
        <label>Password: <strong style="color:darkred;">*</strong></label>
        <input type="password" name="password" value=""/> <br/><br/>

        <p style="color:darkred;">* Only user name and password are required.</p>
        <br/>
        <input type="submit" class="btn btn-primary" value="Register"/>
    </form>
</div>

</body>
</html>