<?php

include "../includes/con_db.inc.php";

if (isset($_POST["Appointment_Id"])) {
    $Appointment_Id = $_POST["Appointment_Id"];

    $sql = "SELECT * FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
    $resulte = mysqli_query($con, $sql);

    $sql = "DELETE FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
    $result = mysqli_query($con, $sql);

    if ($result) {


      $row2 = mysqli_fetch_array($resulte);
      $Patient_Id = $row2["Patient_Id"];
      date_default_timezone_set('Asia/Manila');
                    $notif_id = uniqid('NT');
                    $notif_title = "Your appointment has been <b>Deleted</b>.";
                    $notif_desc = "If you didnt make this changes, please message us. You can always add an appointment(Up to 4 MAX).";
                    $notif_time = date("h:i A");
                    $notif_date = date("Y-m-d");
                    $viewed = "0";
                    $sql = "INSERT INTO notifications(notif_id, patient_id, notif_title, notif_desc, time, date, viewed) VALUES('$notif_id', '$Patient_Id', '$notif_title', '$notif_desc', '$notif_time', '$notif_date', '$viewed' )";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                      exit();
                    }else{
                      echo "There is something wrong with adding shits";
                    }
      return;
    }
}else{
    return;
}
?>
