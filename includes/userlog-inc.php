<?php session_start();
if (isset($_POST["log"]) && isset($_SESSION["userID"])) {

	require_once "config.php";
	require_once "functions.php";


	$uID = $_SESSION["userID"];
	$wID = $_POST['workoutA'];
	$tID = $_POST['trainerA'];
	$date = $_POST['dateA'];
	$newWeight = $_POST['newA'];
	$duration = $_POST['timeA'];
	$notes = $_POST['noteA'];

	if (emptyInputActivity($uID, $wID, $tID,  $date, $newWeight, $duration) !== false) {
		header("Location: ../userLog.php?error=emptyinput");
		exit();
	}

	addActivity($conn, $uID, $wID, $tID, $date, $newWeight, $duration, $notes);
} else {
	header("Location: ../user.php");
	exit();
}
