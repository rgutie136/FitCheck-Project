<?php session_start(); //checks for user logged in before accessing page
if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
} else {
    include_once "html/header.php";
}
require_once "includes/config.php";
$user = $_SESSION["userID"];
$displayLog = mysqli_query($conn, "SELECT * FROM ActivityLog WHERE UserID = '$user'");
$workouts = mysqli_query($conn, "SELECT * FROM Workout");
$trainers = mysqli_query($conn, "SELECT * FROM Trainer");
$bmi = ($_SESSION["userWeight"] / pow(($_SESSION['userHeight'] / 100), 2));
$numBMI = number_format((float)$bmi, 2, '.', '');

?>

<body>
    <center>
        <h1 style="color:black">
            Welcome, <?php echo $_SESSION["userFName"]; ?> <?php echo $_SESSION["userLName"]; ?>!</h1>
    </center>
    <h2>Your Profile Info</h2>
    <table>
        <tr>
            <th>Email</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Height (cm)</th>
            <th>Weight (kg)</th>
            <th>Weight Goal (kg)</th>
            <th>BMI</th>
        </tr>
        <tr>
            <td><?php echo $_SESSION["userEmail"]; ?></td>
            <td><?php echo $_SESSION["userDOB"]; ?></td>
            <td><?php echo $_SESSION["userGender"]; ?></td>
            <td><?php echo $_SESSION["userHeight"]; ?></td>
            <td><?php echo $_SESSION["userWeight"]; ?></td>
            <td><?php echo $_SESSION["userGoal"]; ?></td>
            <td><?php echo $numBMI; ?></td>
        </tr>
        </tr>
    </table>
    <br>
    <h2>Activity Logs<div class="addLogBTN"><a class="actbutton" href="userLog.php">+ Add Activity</a>
        </div>
    </h2>
    <table>
        <tr class="LogHeader">
            <th>Date</th>
            <th>Workout</th>
            <th>Trainer</th>
            <th>Recorded Weight</th>
            <th>Duration</th>
            <th>Notes</th>
        </tr>
        <?php
        if (mysqli_num_rows($displayLog) > 0) {
            while ($row = mysqli_fetch_assoc($displayLog)) {

                $WID = $row["WorkoutID"];
                $resultW = mysqli_query($conn, "SELECT Name FROM Workout WHERE WorkoutID = '$WID';");
                $w = mysqli_fetch_assoc($resultW);
                $TID = $row["TrainerID"];
                $resultT = mysqli_query($conn, "SELECT FName, LName FROM Trainer WHERE TrainerID = '$TID';");
                $t = mysqli_fetch_assoc($resultT);

                echo "<tr>";
                echo "<td>" . $row['Date'] . "</td>";
                echo "<td>" . $w['Name'] . "</td>";
                echo "<td>" . $t["FName"] . " " . $t["LName"] . "</td>";
                echo "<td>" . $row['newWeight'] . " kg </td>";
                echo "<td>" . $row['Duration'] . " minutes</td>";
                echo "<td><div class='tooltip'>User's Notes
                    <span class='tooltiptext'>"
                    . $row["Notes"] .
                    "</span></div></td>";
                echo "</tr>";
            }
        } else {
            echo "No logs to show! Add and activity to the log to view it here.<br>";
        }
        mysqli_close($conn);
        ?>
    </table>
    <br>

    <?php include_once "html/footer.php"; ?>