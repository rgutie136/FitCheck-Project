<?php //session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>FitCheck [PHP-Test]</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav>
		<div class="topBar"> <!--this is used to make a navigation bar on the top for login/signup-->
        <a href="/">Logo</a>
            <div class='right'>
        <?php     
        if(isset($_SESSION["userID"])) {
            echo "<a href='user.php'>My Profile</a>";
            echo "<a href='includes/logout-inc.php'>Logout</a>";
        }
        else {
            echo "<a href='login.php'>Login</a>";
            echo "<a href='signup.php'>Sign Up</a>";
        }
        ?>
      <a href="home.html">Home(HTML)</a>
            </div>
		</div>
	</nav>