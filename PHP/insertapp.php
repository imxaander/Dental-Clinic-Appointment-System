<?php
include "../includes/con_db.inc.php";

if (isset($_POST["Appointment_Id"]) && isset($_POST["Duration"]) &&isset($_POST["Patient_Id"]) && isset($_POST["Cost"]) && isset($_POST["Service"]) && isset($_POST["Medical_History"]) && isset($_POST["Time"]) && isset($_POST["Date"]) &&  isset($_POST["Message"]) &&  isset($_POST["Branch"])) {
    $Appointment_Id = $_POST["Appointment_Id"];
    $Patient_Id = $_POST["Patient_Id"];
    $Cost = $_POST["Cost"];
    $Service = $_POST["Service"];
    $Medical_History = $_POST["Medical_History"];
    $Time = $_POST["Time"];
    $Date = $_POST["Date"];
    $Status = "Pending";
    $Branch = $_POST["Branch"];
    $Message = $_POST["Message"];
    $Duration = $_POST["Duration"];

    if (empty($Appointment_Id))
    {
        header("Location: /index.php?error=Error occured. Please try logging in again.appid");
        exit();
    }else if (empty($Patient_Id))
    {
        header("Location: /index.php?error=Error occured. Please try logging in again.ptid");
        exit();
    }else if (empty($Cost))
    {
        header("Location: /index.php?error=Error occured. Please try logging in again.cost");
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
    }else if (empty($Duration))
    {
        header("Location: ../index.php.php?error=Error occured. Please try logging in again.durationer");
        exit();
    }else{
        $sql="SELECT * FROM appointments WHERE Patient_Id = '$Patient_Id' AND Status != 'Canceled'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 4){
        header("Location: ../index.php?success=You have already maximum appointment for your account. Please");
       exit();
    }else{
        $sql = "INSERT INTO appointments(Appointment_Id, Patient_Id, Cost, Service, Medical_History, Time, Date, Status, Branch, Message, Duration) VALUES('$Appointment_Id', '$Patient_Id', '$Cost', '$Service', '$Medical_History', '$Time', '$Date', '$Status', '$Branch', '$Message', '$Duration')";
        $result = mysqli_query($con, $sql);
   if ($result) {
       header("Location: ../index.php?success=Appointment Added. Please Wait for some changes within the day. Thank you!");
       exit();
   }else{
       header("Location: ../index.php");
       exit();
   }
    }
    }


}else{
    header("Location: ../index.php");
    exit();
}

?>
