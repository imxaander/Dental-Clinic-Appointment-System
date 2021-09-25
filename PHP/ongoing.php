<?php

include "../includes/con_db.inc.php";

if (isset($_POST["Appointment_Id"])) {
    $Appointment_Id = $_POST["Appointment_Id"];

    $sql = "SELECT * FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $sql = "UPDATE appointments SET Status = 'Ongoing' WHERE Appointment_Id = '$Appointment_Id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
          $sql = "SELECT * FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
          $result = mysqli_query($con, $sql);

          while ($row = mysqli_fetch_array($result)) {
            $ntime = date("h:i A", strtotime($row["Time"]." + 18 hours"));
            $ytime = date("h:i A", strtotime($row["Time"]." + ".$row["Duration"]));
            $etime = date("h:i A", strtotime($ytime." + 18 hours"));
          header('Location: /quickstart.php?Name='.$row["Patient_Id"].'&Service='.$row["Service"].'&STime='.$ntime.'&ETime='.$etime.'&Date='.$row["Date"].'&Branch='.$row["Branch"].'');
        }
        exit();
        }else{
            return;
        }
    }else{
        return;
    }
}else{
  return;
}
/*
http://localhost/appointment%20system/quickstart.php?Name=Xander%20Ison&Service=Tooth%20Extraction%20(bunot)&STime=09:00&ETime=14:00&Date=2021-09-15&Branch=J%20Gonzales%20Dental%20Center
*/
?>
