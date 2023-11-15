<?php session_start(); include_once "html/header.php";?>
<center>
<h2>Account Login</h2> 
<?php
    if(isset($_GET["error"])) {
      if($_GET["error"] == "emptyinput") {
        echo "<p class='error'>Please fill in all fields</p>";
      }
      else if($_GET["error"] == "wronglogin") {
        echo "<p class='error'>Incorrect Login. Try again</p>";
      }
    }
  ?>
    </center>
<form action="includes/login-inc.php" method="POST"><div class="accForm">

    <label for="email"><b>Email</b></label><br>
       <input type="email" name="emailLog" placeholder="Email..."><br>
    
    <label for="pwdLog"><b>Password</b></label><br>
	   <input type="password" name="pwdLog" placeholder="Password..."><br>

  <input class="actbutton" type="submit" name="login" value="Log In">
    
</div></form> 
<center><p>Creating a new account? <a href="signup.php">Sign Up</a></p></center>
<?php include_once "html/footer.php";?>