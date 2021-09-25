<?php

include "../includes/con_db.inc.php";

if (isset($_POST["Appointment_Id"])) {
    $Appointment_Id = $_POST["Appointment_Id"];

    $sql = "DELETE FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
      return;
    }
}else{
    return;
}
?>
