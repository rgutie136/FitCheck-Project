<?php
if (isset($_POST["create"])) {

	if (empty($_POST["gender"])) {
		header("Location: ../signup.php?error=emptyinput");
		exit();
	}

	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$pwdRep = $_POST['pwdRepeat'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$weight = $_POST['weight'];
	$height = $_POST['height'];
	$goal = $_POST['goal'];

	require_once "config.php";
	require_once "functions.php";

	//error handlers
	if (emptyInputSignup($email, $pwd, $pwdRep, $fname, $lname, $dob, $gender, $weight, $height, $goal) !== false) {
		header("Location: ../signup.php?error=emptyinput");
		exit();
	}
	if (invalidEmail($email) !== false) {
		header("Location: ../signup.php?error=invalidemail");
		exit();
	}
	if (pwdMatch($pwd, $pwdRep) !== false) {
		header("Location: ../signup.php?error=pwdnotmatch");
		exit();
	}
	if (emailExists($conn, $email) !== false) {
		header("Location: ../signup.php?error=emailexists");
		exit();
	}

	createUser($conn, $email, $pwd, $fname, $lname, $dob, $gender, $weight, $height, $goal);
} else {
	header("Location: ../signup.php");
	exit();
}
