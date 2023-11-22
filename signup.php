<?php session_start(); include_once "html/header.php";?><body>
<center>
<h2>Account Sign Up</h2> 

<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput") {
            echo "<p class='error'>Please fill in all fields</p>";
        }
        else if($_GET["error"] == "invalidemail") {
            echo "<p class='error'>Email is invalid. Try Again</p>";
        }
        else if($_GET["error"] == "emailexists") {
            echo "<p class='error'>Email is already used. Try Another Email</p>";
        }
        else if($_GET["error"] == "pwdnotmatch") {
            echo "<p class='error'>Passwords do not match. Try Again.</p>";
        }
        else if($_GET["error"] == "stmtfail") {
            echo "<p class='success'>Something went wrong. Try again.</p>";
        }
        else if($_GET["error"] == "none") {
      echo "<p class='success'>Account Created!</p>";
        }
    }
?>
        </center>
<form action="includes/signup-inc.php" method="POST">

    <div class="accForm">
		
    <label for="email"><b>Email</b></label><br>
	   <input type="email" name="email" placeholder="Email..."><br>
        
    <label for="pwd"><b>Password</b></label><br>
	   <input type="password" name="pwd" placeholder="Password..."><br>
        
    <label for="pwdRepeat"><b>Repeat Password</b></label><br>
	   <input type="password" name="pwdRepeat" placeholder="Repeat Password..."><br>
        
	<label for="fname"><b>First Name</b></label><br>
	   <input type="text" name="fname" placeholder="First Name..." maxlength=10 minlength=1>    <br>
        
    <label for="lname"><b>Last Name</b></label><br>
	   <input type="text" name="lname" placeholder="Last Name..." maxlength=10 minlength=1> <br>
        
	<label for="dob"><b>Date of Birth</b></label><br>
	   <input type="date" name="dob"><br>
        
	<label for="gender"><b>Gender</b></label><br>
	   <input type="radio" name="gender" value="M">Male
	   <input type="radio" name="gender" value="F">Female
	   <input type="radio" name="gender" value="O">Other<br><br>
        
	<label for="weight"><b>Weight(kg)</b></label><br>
	   <input type="number" name="weight" placeholder="Weight..."> <br>
        
	<label for="height"><b>Height(cm)</b></label><br>
	   <input type="number" name="height" placeholder="Height..."><br>
        
	<label for="goal"><b>Weight Goal(kg)</b></label><br>
	   <input type="number" name="goal" placeholder="Weight Goal..."><br>
        
	   <input class="actbutton" type="submit" name="create" value="Create Account">
  </div>
    </form>
<center><p>Already have an account? <a href="login.php">Log in</a></p></center>
<br><br>
<?php include_once "html/footer.php";?> 