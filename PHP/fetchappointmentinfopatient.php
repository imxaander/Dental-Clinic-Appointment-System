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
          <p>Service :  <?php echo $row["Service"]; ?> </p>

          <p>Branch : <?php echo $row["Branch"] ?></p>
          <p>Patient Note :  <?php echo $row["Message"]; ?> </p>
          <p>Appointment Code :  <?php echo $row["Appointment_Id"]; ?> </p>
    
          <hr>
          <p>Cancel?</p>
          <a data-role="cancel"  data-id="<?php echo $row["Appointment_Id"]; ?>" class="Status_Btn" style="background-color: Red;">Cancel</a><br>
          <hr>
          <p>Other options : </p>

<br><br>

<form method="post" target="popup" id="PatientProfile" style="display:none" action="profile.php" >
<input type="hidden" name="Patient_Id" value="<?php echo $row["Patient_Id"]; ?>" />
<input type="hidden" name="Staff_Id" value="<?php echo $_SESSION["Staff_Id"] ?>" />
</form>
    <?php
  }
}
?>
