<?php

include "../includes/con_db.inc.php";

if (isset($_POST["Appointment_Id"])) {
    $Appointment_Id = $_POST["Appointment_Id"];
    $etime = $_POST["etime"];
    $edate = $_POST["edate"];

    $sql = "UPDATE appointments SET Time = '$etime', Date = '$edate' WHERE Appointment_Id = '$Appointment_Id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
      return;
    }
}else{
    return;
}
?>
