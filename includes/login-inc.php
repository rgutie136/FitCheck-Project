<?php
if (isset($_POST["login"])) {

	$email = $_POST['emailLog'];
	$pwd = $_POST['pwdLog'];

	require_once "config.php";
	require_once "functions.php";

	if (emptyInputLogin($email, $pwd) !== false) {
		header("Location: ../login.php?error=emptyinput");
		exit();
	}

	logInUser($conn, $email, $pwd);
} else {
	header("Location: ../login.php");
	exit();
}
