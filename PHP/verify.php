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