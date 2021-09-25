<?php
session_start();
include "../includes/con_db.inc.php";
if (isset($_POST["Appointment_Id"])) {
  $Appointment_Id = $_POST["Appointment_Id"];
  $sql = "SELECT * FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    $row = mysqli_fetch_array($result); ?>

 <br> </button>

          <div class="" id="<?php echo $row["Appointment_Id"]; ?>">
          <p>Appointment_Id :  <?php echo $row["Appointment_Id"]; ?> </p>
          <p>Patient_Id :  <?php echo $row["Patient_Id"]; ?>  <span><a  style="background-color: Red;" class="Status_Btn"  onclick="ProfilePatient()"> Who?</a></span></p>
          <p> Medical History:  <?php echo $row["Medical_History"]; ?> </p>
          <p>Cost :  <?php echo $row["Cost"]; ?> </p>
          <p>Branch : <?php echo $row["Branch"] ?></p>
          <p>Patient Note :  <?php echo $row["Message"]; ?> </p>
          <hr>

          <span>Time</span> <input type="time" data-id="<?php echo $row["Appointment_Id"]; ?>"  id="etime" value="" placeholder="<?php echo $row["Time"] ?>"><br>

          <span>Date</span> <input type="date" data-id="<?php echo $row["Appointment_Id"]; ?>"  id="edate" value="" placeholder="<?php echo $row["Date"] ?>">

          <button data-role="updatetd" name="button" data-id="<?php echo $row["Appointment_Id"] ?>">Update time and date</button>

          <hr>
          <p>Status : </p>
          <a data-role="cancel"  data-id="<?php echo $row["Appointment_Id"]; ?>" class="Status_Btn" style="background-color: Red;">Cancel</a>, <a data-role="ongoing" class="Status_Btn" data-id="<?php echo $row["Appointment_Id"]; ?>" class="Status_Btn" style="background-color: Blue;">Ongoing</a>,
          <a data-role="done" data-id="<?php echo $row["Appointment_Id"]; ?>" class="Status_Btn" style="background-color: Green;">Done</a>   <br><br>
          <hr>
          <p>Other options : </p>
          <a data-role="delete"  data-id="<?php echo $row["Appointment_Id"]; ?>" class="Status_Btn" style="background-color: Red;">Delete</a>,
<br><br>

<form method="post" target="popup" id="PatientProfile" style="display:none" action="profile.php" >
<input type="hidden" name="Patient_Id" value="<?php echo $row["Patient_Id"]; ?>" />
<input type="hidden" name="Staff_Id" value="<?php echo $_SESSION["Staff_Id"] ?>" />
</form>
    <?php

  }
}
?>
