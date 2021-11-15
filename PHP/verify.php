<?php
session_start();
include "../includes/con_db.inc.php";

if (isset($_GET["vcode"])) {
    $vcode = $_GET["vcode"];

    if (strlen($vcode) == 5) {
        $sql = "SELECT * FROM patients WHERE vcode = '$vcode'";
        $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row["vcode"] == $vcode) {
            $sql ="UPDATE patients SET verified = '1' WHERE vcode = '$vcode'";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $sql ="UPDATE patients SET vcode = '0' WHERE vcode = '$vcode'";
                $result = mysqli_query($con, $sql);
                if ($result) {

                  date_default_timezone_set('Asia/Manila');
                  $Patient_Id = $row["Patient_Id"];
                  $notif_id = uniqid('NT');
                  $notif_title = "Welcome to <b>JGonzales Dental Center</b>!";
                  $notif_desc = "Your account has been Verified and Welcome to JGonzales Dental Center! Please check our services here and we are grateful to have you here!";
                  $notif_time = date("h:i A");
                  $notif_date = date("Y-m-d");
                  $viewed = "0";
                  $sql = "INSERT INTO notifications(notif_id, patient_id, notif_title, notif_desc, time, date, viewed) VALUES('$notif_id', '$Patient_Id', '$notif_title', '$notif_desc', '$notif_time', '$notif_date', '$viewed' )";
                  $result = mysqli_query($con, $sql);

                  if ($result) {
                    header("Location: ../login_page.php?success=Email Verified. Please Login.");
                exit();
                  }else{
                    echo "There is something wrong with adding shits notif(verify)";
                  }
                    header("Location: ../login_page.php?success=Email Verified. Please Login.");
                exit();
                }

            }
        }else{
            header("Location: ../index.php");
            exit();
        }
    }else{
        header("Location: ../index.php");
        exit();
    }
    }else{
        header("Location: ../index.php");
    exit();
    }



}else{
    header("Location: ../index.php");
    exit();
}
