<?php session_start(); //checks for user logged in before accessing page
//(git test)
if(!isset($_SESSION['userID'])) { header("Location: login.php"); exit();}
else {include_once "html/header.php";}
?>

<h2>Welcome, User!</h2>

Your Profile:<br>
[display user statistic: weight, dob, height, goal, etc.]<br>
<br><br>
Your Activity Logs:<br>
[display user activity logs]<br>
<a href="userLog.php">Add Activity</a>

<?php include_once "html/footer.php";?>