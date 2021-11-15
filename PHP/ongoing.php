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

        $row2 = mysqli_fetch_array($result);
        $Patient_Id = $row2["Patient_Id"];
        date_default_timezone_set('Asia/Manila');
                  $notif_id = uniqid('NT');
                  $notif_title = "Your appointment has been <b>Approved</b>.";
                  $notif_desc = "Appointment (". $Appointment_Id .")has been approved. If you have concerns or want some changes Please message us.";
                  $notif_time = date("h:i A");
                  $notif_date = date("Y-m-d");
                  $viewed = "0";
                  $sql = "INSERT INTO notifications(notif_id, patient_id, notif_title, notif_desc, time, date, viewed) VALUES('$notif_id', '$Patient_Id', '$notif_title', '$notif_desc', '$notif_time', '$notif_date', '$viewed' )";
                  $resultw = mysqli_query($con, $sql);

                  if ($resultw) {
                    echo "notified";
                    $sql = "SELECT * FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
                    $resultC = mysqli_query($con, $sql);
                    while ($row3 = mysqli_fetch_array($resultC)) {
                      date_default_timezone_set('Asia/Manila');
                      $ntime = date("h:i A", strtotime($row3["Time"]." + 0 hours"));
                      $ytime = date("h:i A", strtotime($row3["Time"]." + ".$row3["Duration"]));
                      $etime = date("h:i A", strtotime($ytime." + 0 hours"));
                      echo $etime;
                      header('Location: /quickstart.php?Name='.$Patient_Id.'&Service='.$row3["Service"].'&STime='.$ntime.'&ETime='.$etime.'&Date='.$row3["Date"].'&Branch='.$row3["Branch"].'');
                  }
                  }else{
                    echo "There is something wrong with adding shits";
                  }
      }else{
          return;
      }
  }else{
      return;
  }
}

if(isset($_GET["uwu"])){
  echo "uwu";
  
  $Appointment_Id = $_GET["uwu"];

    $sql = "SELECT * FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $sql = "UPDATE appointments SET Status = 'Ongoing' WHERE Appointment_Id = '$Appointment_Id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
          $sql = "SELECT * FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
          $result = mysqli_query($con, $sql);

          $row2 = mysqli_fetch_array($result);
          $Patient_Id = $row2["Patient_Id"];
          date_default_timezone_set('Asia/Manila');
                    $notif_id = uniqid('NT');
                    $notif_title = "Your appointment has been <b>Approved</b>.";
                    $notif_desc = "Appointment (". $Appointment_Id .")has been approved. If you have concerns or want some changes Please message us.";
                    $notif_time = date("h:i A");
                    $notif_date = date("Y-m-d");
                    $viewed = "0";
                    $sql = "INSERT INTO notifications(notif_id, patient_id, notif_title, notif_desc, time, date, viewed) VALUES('$notif_id', '$Patient_Id', '$notif_title', '$notif_desc', '$notif_time', '$notif_date', '$viewed' )";
                    $resultw = mysqli_query($con, $sql);

                    if ($resultw) {
                      echo "notified";
                      $sql = "SELECT * FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
                      $resultC = mysqli_query($con, $sql);
                      while ($row3 = mysqli_fetch_array($resultC)) {
                        date_default_timezone_set('Asia/Manila');
                        $ntime = date("h:i A", strtotime($row3["Time"]." + 0 hours"));
                        $ytime = date("h:i A", strtotime($row3["Time"]." + ".$row3["Duration"]));
                        $etime = date("h:i A", strtotime($ytime." + 0 hours"));
                        header('Location: /quickstart.php?Name='.$Patient_Id.'&Service='.$row3["Service"].'&STime='.$ntime.'&ETime='.$etime.'&Date='.$row3["Date"].'&Branch='.$row3["Branch"].'');
                        
                    }
                    }else{
                      echo "There is something wrong with adding shits";
                    }
        }else{
            return;
        }
    }else{
        return;
    }
}
/*
http://localhost/quickstart.php?Name=PT6176b04ec2a18&Service=Tooth%20Extraction%20(bunot)&STime=10:00&ETime=14:00&Date=2021-11-18&Branch=J%20Gonzales%20Dental%20Center
*/

/* in case needed, past ongoing script
$Appointment_Id = $_POST["Appointment_Id"];

    $sql = "SELECT * FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $sql = "UPDATE appointments SET Status = 'Ongoing' WHERE Appointment_Id = '$Appointment_Id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
          $sql = "SELECT * FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
          $result = mysqli_query($con, $sql);

          $row2 = mysqli_fetch_array($result);
          $Patient_Id = $row2["Patient_Id"];
          date_default_timezone_set('Asia/Manila');
                    $notif_id = uniqid('NT');
                    $notif_title = "Your appointment has been <b>Approved</b>.";
                    $notif_desc = "Appointment (". $Appointment_Id .")has been approved. If you have concerns or want some changes Please message us.";
                    $notif_time = date("h:i A");
                    $notif_date = date("Y-m-d");
                    $viewed = "0";
                    $sql = "INSERT INTO notifications(notif_id, patient_id, notif_title, notif_desc, time, date, viewed) VALUES('$notif_id', '$Patient_Id', '$notif_title', '$notif_desc', '$notif_time', '$notif_date', '$viewed' )";
                    $resultw = mysqli_query($con, $sql);

                    if ($resultw) {
                      while ($row2 = mysqli_fetch_array($result)) {
                        $ntime = date("h:i A", strtotime($row2["Time"]." + 18 hours"));
                        $ytime = date("h:i A", strtotime($row2["Time"]." + ".$row2["Duration"]));
                        $etime = date("h:i A", strtotime($ytime." + 18 hours"));
                      header('Location: /quickstart.php?Name='.$Patient_Id.'&Service='.$row2["Service"].'&STime='.$ntime.'&ETime='.$etime.'&Date='.$row2["Date"].'&Branch='.$row2["Branch"].'');
                    }
                    exit();
                    }else{
                      echo "There is something wrong with adding shits";
                    }
        }else{
            return;
        }
    }else{
        return;
    }
    */
?>
