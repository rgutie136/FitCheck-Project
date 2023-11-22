<?php //session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>FitCheck</title>
	<link rel="stylesheet" href="css/style.css">
</head>
    <!--this is used to make a navigation bar on the top for login/signup-->
	<div class="topBar">
        <a href="/">FitCheck</a>
            <div class='right'>
        <?php     
        if(isset($_SESSION["userID"])) {
            echo "<a href='user.php'>My Profile</a>";
            echo "<a href='includes/logout-inc.php'>Logout</a>";
        }
        else {
            echo "<a href='includes/bypass.php'>Insta Log(test)</a>";
            // insta log used to test for user activity and add activities to db without login prompt
            echo "<a href='login.php'>Login</a>";
            echo "<a href='signup.php'>Sign Up</a>";
        }
        ?>
        </div>
	</div>
