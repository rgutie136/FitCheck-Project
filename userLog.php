<?php session_start(); //checks for user logged in before accessing page
if(!isset($_SESSION['userID'])) { header("Location: login.php"); exit();}
else {include_once "html/header.php";}
?>

  <h1> Activity Log</h1>
<div class="accForm">
  <label for = "Date">Date</label>
  <input type = "date" id="dateA" name="date"><br>
  <br>
  <label for = "Workout"> Workout ID</label>
  <input type="text" id="workoutA" name="WorkoutID"><br>
  <br>
  <label for = "Trainer"> Trainer ID</label>
  <input type="text" id="trainerA" name="Trainer"><br>
  <br>
  <label for = "NewWeight">New Weight(kg)</label>
  <input type="number" id="newWeightA" name="NewWeight"><br>
  <br>
  <label for = "Duration">Duration(minutes)</label>
  <input type="number" id="durationA" name="Duration"><br>
  <br>
  <label for = "Notes">Notes(Description)</label>
  <input type="text" id="notesA" name="Notes"><br>
</div>
       <a class ="return" href="user.php">Return to My Profile</a>
</form>

<?php include_once "html/footer.php";?>