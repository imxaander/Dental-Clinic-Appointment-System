<?php
include "../includes/con_db.inc.php";

if (isset($_POST["Appointment_Id"])  && isset($_POST["Patient_Id"]) && isset($_POST["Service"]) && isset($_POST["Medical_History"]) && isset($_POST["Time"]) && isset($_POST["Date"]) &&  isset($_POST["Message"]) && isset($_POST["Branch"])) {
    $Appointment_Id = $_POST["Appointment_Id"];
    $Patient_Id = $_POST["Patient_Id"];

    $Service = $_POST["Service"];
    $Medical_History = $_POST["Medical_History"];
    $Time = $_POST["Time"];
    $Date = $_POST["Date"];
    $Status = "Pending";
    $Branch = $_POST["Branch"];
    $Message = $_POST["Message"];
    $Duration = $_POST["Duration"];
    $Appointment_Type = "Onsite";

    if (empty($Appointment_Id))
    {
        header("Location: /index.php?error=Error occured. Please try logging in again.appid");
        exit();
    }else if (empty($Patient_Id))
    {
        header("Location: /index.php?error=Error occured. Please try logging in again.ptid");
        exit();
    }else if (empty($Service))
    {
        header("Location: ../index.php.php?error=Service is requiredservice");
        exit();
    }else if (empty($Medical_History))
    {
        header("Location: ../index.php.php?error=Medical History is requiredmedhis");
        exit();
    }else if (empty($Time))
    {
        header("Location: ../index.php.php?error=Time is requiredsadtime");
        exit();
    }else if (empty($Date))
    {
        header("Location: ../index.php.php?error=Date is requireddateers");
        exit();
    }else if (empty($Status))
    {
        header("Location: ../index.php.php?error=Error occured. Please try logging in again.statuser");
        exit();
    }else if (empty($Branch))
    {
        header("Location: ../index.php.php?error=Error occured. Please try logging in again.brancher");
        exit();
    }else{
        $sql="SELECT * FROM appointments WHERE Patient_Id = '$Patient_Id' AND Status != 'Canceled'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 4){
        header("Location: ../index.php?success=You have already maximum appointment for your account. Please");
       exit();
    }else{
        $sql = "INSERT INTO appointments(Appointment_Id, Patient_Id, Service, Medical_History, Time, Date, Status, Branch, Message, type, duration) VALUES('$Appointment_Id', '$Patient_Id', '$Service', '$Medical_History', '$Time', '$Date', '$Status', '$Branch', '$Message', '$Appointment_Type', '$Duration')";
        $result = mysqli_query($con, $sql);
   if ($result) {
     date_default_timezone_set('Asia/Manila');
                 $notif_id = uniqid('NT');
                 $notif_title = "Your appointment has been <b>Posted</b>";
                 $notif_desc = "Appointment(". $Appointment_Id .")has been posted. Please wait for approval and check your messages for concern.";
                 $notif_time = date("h:i A");
                 $notif_date = date("Y-m-d");
                 $viewed = "0";
                 $sql = "INSERT INTO notifications(notif_id, patient_id, notif_title, notif_desc, time, date, viewed) VALUES('$notif_id', '$Patient_Id', '$notif_title', '$notif_desc', '$notif_time', '$notif_date', '$viewed' )";
                 $result = mysqli_query($con, $sql);

                 if ($result) {
                   header("Location: ../index.php?");
                   exit();
                 }else{
                   echo "There is something wrong with adding shits";
                 }
       header("Location: ../index.php?success=Appointment Added. Please Wait for some changes within the day. Thank you!");
       exit();
   }else{
       #header("Location: ../index.php?error=damn");
       echo mysqli_error($con);
       echo "gehres";
       exit();
   }
    }
    }


}else{
    header("Location: ../index.php");
    exit();
}

?>
