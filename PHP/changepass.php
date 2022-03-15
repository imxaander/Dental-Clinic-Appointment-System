<?php

include '../includes/con_db.inc.php';
include "functions.php";
require_once ('PHPMailer\PHPMailerAutoload.php');

if(isset($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $token = $_POST["code"];
    $sql = "UPDATE patients SET password='$password' WHERE Email = '$email'";
    $result = mysqli_query($con, $sql);
    if($result){

        $sql = "DELETE FROM changepass WHERE pass_token ='$token'";
        $result = mysqli_query($con, $sql);

        if($result){
            $url = "";

            $subject = 'Your Account Password Is Changed';

            $message = '
            <div style="
            font-family : monospace;
            width : 300px;
            height : 400px;
            border : #00b4d8;
            border-style : solid;
            ">
            <div style="
            height : 10%;
            border-bottom: solid;
            border-color : #00b4d8;
            background-color : #00b4d8;
            ">
          <p align="center" style="
            margin : 0;
            font-size : 20px;
            color : white;
          "> J Gonzales Dental Center</p>
            </div>
            <br>
        
          <p style="
            text-indent : 30px;
            margin : 10px;
            line-height: 30px;
          ">
            Hello Patient! <br>
            Your password has changed.

          </p>
          <br>
          <p style="
        margin : 10px;
          ">
            Regards,<br>
            J Gonzales Dental Center
          </p>
            </div>
            ';
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = '465';
            $mail->isHTML();
            $mail->Username = 'j.gonzales.dentalclinic@gmail.com';
            $mail->Password = 'j.gonzales.dentalclinic@gmail.com123';
            $mail->addAddress($email);
            $mail->SetFrom('no-reply@jgonzales.com');
            $mail->Subject = $subject;
            $mail->Body = $message;

            if ($mail->Send()){
                header("Location: ../login_page.php?sucess=Your password has been changed.");
                exit();
            }
        }else{
            header("Location: ../login_page.php?error=Password not deleted");
                exit();
        }
        
    }
}else{
    header("Location: ../index.php?error=You cant access that.");
    exit();
}