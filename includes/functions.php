<?php 
//the functions are used to validate the form data and return the validated data 
	
	function emptyInputSignup($email, $pwd, $pwdRep, $fname, $lname, $dob, $gender, $weight, $height, $goal) {
		$result;
		if (empty($email)	|| empty($pwd)		||
			empty($pwdRep)	|| empty($gender)	||
			empty($lname) 	|| empty($fname) 	||
			empty($dob) 	|| empty($weight) 	||
			empty($height) 	|| empty($goal) ) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}
	function invalidEmail($email){
		$result;
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}	
	function pwdMatch($pwd, $pwdRepeat) {
		$result;
		if ($pwd !== $pwdRepeat) {
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}
	function emailExists($conn, $email) {
		$sql = "SELECT * FROM Users WHERE Email = ?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
		    header("location: ../signup.php?error=stmtfail");
		    exit();
		}
		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);
		
		$resultData = mysqli_stmt_get_result($stmt);
		
		if ($row = mysqli_fetch_assoc($resultData)) {
			return $row; 
			//This will return the login info if the email exists
		}
		else {
			$result = false;
			return $result;
		}
		mysqli_stmt_close($stmt);
		
	}
	function createUser($conn, $email, $pwd, $fname, $lname, $dob, $gender, $weight, $height, $goal) {
		$sql = "INSERT INTO Users (Email, Password, FName, LName, Birth, Gender, Weight, Height, WeightGoal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../signup.php?error=stmtfail");
			exit();
		}
		$hashedPwd = $pwd;
        //hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
		
		$sqlDOB = date("Y-m-d",strtotime($dob));
		mysqli_stmt_bind_param($stmt, "ssssssddd", $email, $hashedPwd, $fname, $lname, $sqlDOB, $gender, $weight, $height, $goal);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
        header("location: ../signup.php?error=none");
        loginUser($conn, $email, $pwd);
        exit();
	}

  function emptyInputLogin($email, $pwd) {
    $result;
    if (empty($email)	|| empty($pwd)) {
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
  }

  function loginUser($conn, $email, $pwd) {
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false) {
      header("location: ../login.php?error=wronglogin");
      exit();
    }
    $pwdHashed = $emailExists["Password"];
    
    $checkPwd = ($pwdHashed == $pwd); //used for tuples
    //$checkPwd = password_verify($pwd, $pwdHashed);
    if ($checkPwd === false) {
      header("location: ../login.php?error=wronglogin");
      exit();
    }
    else if($checkPwd === true) {
      // use $_SESSION for getting userID and data 
      session_start();
        $_SESSION["userID"] = $emailExists["UserID"];

        $_SESSION["userEmail"] = $emailExists["Email"];

        $_SESSION["userFName"] = $emailExists["FName"];

        $_SESSION["userLName"] = $emailExists["LName"];

        $_SESSION["userDOB"] = $emailExists["Birth"];

        $_SESSION["userWeight"] = $emailExists["Weight"];

        $_SESSION["userHeight"] = $emailExists["Height"];

        $_SESSION["userGender"] = $emailExists["Gender"];

        $_SESSION["userGoal"] = $emailExists["WeightGoal"];
      header("Location: ../user.php");
      exit();
    }
  }
function emptyInputActivity($uID, $wID, $tID, $date, $newWeight, $time) {
    $result;
    if (empty($uID)	|| empty($wID)	|| empty($tID)	|| 
        empty($date)	|| empty($newWeight) ||
        empty($time)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function addActivity($conn, $uID, $wID, $tID, $date, $newWeight, $time, $notes) {
    $sql = "INSERT INTO ActivityLog (UserID, WorkoutID, TrainerID, Date, newWeight, Duration, Notes) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../userLog.php?error=stmtfail");
        exit();
    }
    $sqlDate = date("Y-m-d",strtotime($date));
    mysqli_stmt_bind_param($stmt, "iiisdis", $uID, $wID, $tID, $date, $newWeight, $time, $notes);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../userLog.php?error=none");
    exit();
}