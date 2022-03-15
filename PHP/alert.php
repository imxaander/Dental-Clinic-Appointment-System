<?php
include "../includes/con_db.inc.php";

if(isset($_POST["Appointment_Id"])){
  $Appointment_Id = $_POST["Appointment_Id"];
  #fetch patient's id
  $sql = "SELECT * FROM appointments WHERE Appointment_Id = '$Appointment_Id'";
  $result = mysqli_query($con, $sql);

  $row = mysqli_fetch_array($result);
  $Patient_Id = $row["Patient_Id"];

  #fetch patient's informations
  $sql = "SELECT * FROM patients WHERE Patient_Id = '$Patient_Id'";
  $result = mysqli_query($con, $sql);

  $row = mysqli_fetch_array($result);
  $displayName = "System";
  $Chat_Id = $row["chat_id"];
  $msgId = uniqid("MSG");
  $msgContent = "Hello! Your appointment will begin in 15 minutes.";
  date_default_timezone_set('Asia/Manila');
  $timestamp = time();
  #add to notifications and chat

  $sql = "INSERT INTO chat_app(message_id, chat_id, author_id, display_name, message_content, timestamp)
  VALUES('$msgId', '$Chat_Id', 'CTSystem', '$displayName', '$msgContent', '$timestamp')";
  $result = mysqli_query($con, $sql);

  if($result){
    $notif_id = uniqid('NT');
    $notif_title = "Your appointment will start <b>Soon!</b>";
    $notif_desc = "Your appointment will start in 15 minutes. Please prepare soon.";
    $notif_time = date("h:i A");
    $notif_date = date("Y-m-d");
    $viewed = "0";
    $sql = "INSERT INTO notifications(notif_id, patient_id, notif_title, notif_desc, time, date, viewed) VALUES('$notif_id', '$Patient_Id', '$notif_title', '$notif_desc', '$notif_time', '$notif_date', '$viewed')";
    $result = mysqli_query($con, $sql);

    if($result){
      $sql = "UPDATE appointments SET Status = 'Alert' WHERE Appointment_Id = '$Appointment_Id'";
      $result = mysqli_query($con, $sql);

      if($result){
        echo "status changed.";
      }
    }else{
      echo "still not notified.";
    }
  }else{
    echo "not snet";
  }

}
?>
