<?php
include '../includes/con_db.inc.php';
include "functions.php";
require_once ('PHPMailer\PHPMailerAutoload.php');

if(isset($_POST["Email"])){
            $Email = $_POST["Email"];
            $vcode = VCode();
            $sql = "SELECT * FROM patients WHERE email = '$Email'";
            $result = mysqli_query($con, $sql);
            


            if(mysqli_num_rows($result) == 1){
                
                $url = "http://" . $_SERVER['SERVER_NAME'] . "/changepass_page.php?vcode=" . $vcode . "&email=" . $Email;

                $subject = 'Password Change Request';

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



                <a href="'. $url . '"  style="
              margin:auto; text-align:center; display:block;
              padding : 10px;
              text-decoration : none;
              color : white;
              background-color : #00b4d8;
              width : 60%;
              border-radius : 5px;
                "
                >Change your password.</a>
            
              <p style="
                text-indent : 30px;
                margin : 10px;
                line-height: 30px;
              ">
                Hello Patient! <br>
                A request was made to change your password for your account.

                If this was you, please click this link <a href="'. $url . '">'. $url . '</a> 
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
                $mail->addAddress($Email);
                $mail->SetFrom('no-reply@jgonzales.com');
                $mail->Subject = $subject;
                $mail->Body = $message;

                if ($mail->Send())
                {   
                    date_default_timezone_set('Asia/Manila');
                    $pass_id = uniqid('CG');
                    $pass_token = $vcode;
                    $pass_expiry = strtotime('+1 hour');
                    $sql = "INSERT INTO changepass(pass_id, email, pass_token, pass_expiry) VALUES('$pass_id', '$Email', '$pass_token', '$pass_expiry')";
                    $result = mysqli_query($con, $sql);

                    if($result){
                        header("Location: ../forgotpass.php?success=Email has been sent. Please check your spam if you're not be able to see them.");
                    exit();
                    }else{
                        header("Location: ../forgotpass.php?error=Sending email occured. please check your email." . $mail->ErrorInfo);
                    exit();
                    }
                    
                }else{
                    header("Location: ../forgotpass.php?success=Email has not been sent. Please Try Again.");
                    exit();
                }

            }else{
                header("Location: ../forgotpass.php?error=There's no email matching with this email." . $mail->ErrorInfo);
                exit();
            }
}else{
    header("Location: ../forgotpass.php?error=There's no email posted." . $mail->ErrorInfo);
    exit();
}