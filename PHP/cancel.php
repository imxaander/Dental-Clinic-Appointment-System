<?php

include "../includes/con_db.inc.php";

if (isset($_POST["Appointment_Id"])) {
    $Appointment_Id = $_POST["Appointment_Id"];

    $sql = "SELECT * FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $sql = "UPDATE appointments SET Status = 'Canceled' WHERE Appointment_Id = '$Appointment_Id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return;
        }else{
            return;
        }
    }else{
        return;
    }
}else{
    return;
}
?>
