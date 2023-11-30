<?php session_start(); //checks for user logged in before accessing page
if(!isset($_SESSION['userID'])) { header("Location: login.php"); exit();}
else {include_once "html/header.php";}
    require_once "includes/config.php";
    $workouts = mysqli_query($conn,"SELECT * FROM Workout");
    $trainers = mysqli_query($conn,"SELECT * FROM Trainer");
?><body>

<center><h2>Activity Log</h2>
    <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput") {
                echo "<p class='error'>Please fill in all fields</p>";
            }
            else if($_GET["error"] == "stmtfail") {
                echo "<p class='success'>Something went wrong. Try again.</p>";
            }
            else if($_GET["error"] == "none") {
          echo "<p class='success'>Activity Added!</p>";
            }
        }
    ?>
</center>

<form action="includes/userlog-inc.php" method="POST">
    <div class="accForm">
        <label for = "dateA">Date</label><br>
            <input type = "date" name="dateA"><br>
        <br>
        <label for = "workoutA"> Workout</label><br>
            <select name="workoutA"><br>
            <?php while ($w = mysqli_fetch_array($workouts,MYSQLI_ASSOC)):;?>
                <option value="<?php echo $w["WorkoutID"];?>">
                    <?php echo $w["Name"];?>
                </option>
            <?php endwhile; ?>
            </select><br>
        <br>
        <label for = "trainerA"> Trainer</label><br>
            <select name="trainerA"><br>
            <?php while ($t = mysqli_fetch_array($trainers,MYSQLI_ASSOC)):; ?>
                    <option value="<?php echo $t['TrainerID'];?>">
                        <?php echo $t['FName'];?> <?php echo $t['LName'];?> | <?php echo $t['Type'];?>
                    </option>
            <?php endwhile; ?>
            </select><br>
        <br>
        <label for = "newA">Recorded Weight (kg)</label><br>
            <input type="number"  name="newA" placeholder="Recorded Weight.."><br>
        <br>
        <label for = "timeA">Duration (minutes)</label><br>
            <input type="number" name="timeA" placeholder="Duration..."><br>
        <br>
        <label for = "noteA">Notes (Optional)</label><br>
            <textarea type="text" name="noteA" rows=9 cols=50></textarea><br>
        <div class="actSubmit">
            <input type="submit" name="log" value="Add Activity"> <a href="user.php">Return</a>
        </div>
    
</div>
</form>

<?php include_once "html/footer.php";?>