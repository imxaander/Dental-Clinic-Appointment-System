<?php
session_start();

include "../includes/con_db.inc.php";

include "functions.php";

require_once ('PHPMailer\PHPMailerAutoload.php');



if (isset($_POST['Patient_Id']) && isset($_POST['Password']) && isset($_POST['First_Name']) && isset($_POST['Last_Name']) && isset($_POST['Age']) && isset($_POST['Date_of_Birth']) && isset($_POST['Gender']) && isset($_POST['Occupation']) && isset($_POST['Branch']) && isset($_POST['Civil_Status']) && isset($_POST['Contact_No']) && isset($_POST['Verified']) && isset($_POST["Middle_Name"]))
{

    $Patient_Id = validate($_POST["Patient_Id"]);
    $Verified = validate($_POST["Verified"]);
    $Email = validate($_POST["Email"]);
    $Password = validate($_POST["Password"]);
    $First_Name = validate($_POST["First_Name"]);
    $Middle_Name = validate($_POST["Middle_Name"]);
    $Last_Name = validate($_POST["Last_Name"]);
    $Age = validate($_POST["Age"]);
    $Date_of_Birth = validate($_POST["Date_of_Birth"]);
    $Gender = validate($_POST["Gender"]);
    $Occupation = validate($_POST["Occupation"]);
    $Branch = validate($_POST["Branch"]);
    $Address = validate($_POST["Address"]);
    $Civil_Status = validate($_POST["Civil_Status"]);
    $Contact_No = validate($_POST["Contact_No"]);
    $chat_id = uniqid("CT");

    if (empty($Email))
    {
        header("Location: ../register_page.php?error=Email is required");
        exit();
    }
    else if (!filter_var($Email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../register_page.php?error=Email is not valid.");
        exit();
    }
    else if (empty($Password))
    {
        header("Location: ../register_page.php?error=Password is required");
        exit();
    }
    else if (empty($Patient_Id))
    {
        header("Location: ../register_page.php?error=Error Occured");
        exit();
    }
    else if (empty($First_Name))
    {
        header("Location: ../register_page.php?error=First Name is required");
        exit();
    }
    else if (empty($Middle_Name))
    {
        header("Location: ../register_page.php?error=Middle Name is required");
        exit();
    }
    else if (empty($Last_Name))
    {
        header("Location: ../register_page.php?error=Last Name is required");
        exit();
    }
    else if (empty($Age))
    {
        header("Location: ../register_page.php?error=Age is required");
        exit();
    }
    else if (empty($Address))
    {
        header("Location: ../register_page.php?error=Address is required");
        exit();
    }
    else if (empty($Date_of_Birth))
    {
        header("Location: ../register_page.php?error=Birthdate is required");
        exit();
    }
    else if (empty($Gender))
    {
        header("Location: ../register_page.php?error=Gender is required");
        exit();
    }
    else if (empty($Occupation))
    {
        header("Location: ../register_page.php?error=Occupation is required");
        exit();
    }
    else if (empty($Branch))
    {
        header("Location: ../register_page.php?error=Branch is required");
        exit();
    }
    else if (empty($Civil_Status))
    {
        header("Location: ../register_page.php?error=Civil Status is required");
        exit();
    }
    else if (empty($Contact_No))
    {
        header("Location: ../register_page.php?error=Contact Number is required");
        exit();
    }
    else
    {

        #$password = md5($password);
        $sql = "SELECT * FROM patients WHERE email = '$Email'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0)
        {

            header("Location: ../register_page.php?error=This email is used.Try another email.");
            exit();

        }
        else
        {
            $vcode = VCode();
            $sql = "INSERT INTO patients(Patient_Id, Verified, vcode, Email, Password, First_Name, Middle_Name, Last_Name, Age, Date_of_Birth, Gender, Occupation, Branch, Address, Civil_Status, Contact_No, chat_id) VALUES('$Patient_Id', '$Verified', '$vcode', '$Email', '$Password', '$First_Name', '$Middle_Name', '$Last_Name', '$Age', '$Date_of_Birth', '$Gender', '$Occupation', '$Branch', '$Address', '$Civil_Status', '$Contact_No', '$chat_id')";
            $result = mysqli_query($con, $sql);
            if ($result)
            {

                $url = "http://" . $_SERVER['SERVER_NAME'] . "/PHP/verify.php?vcode=" . $vcode;

                $subject = 'Verify your account for J. Gonzales Clinic';

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
                >Verify Email Address.</a>
            <br>
              <p style="
                text-indent : 30px;
                margin : 10px;
                line-height: 30px;
              ">
                To continue the account creation for J Gonzales Dental Center, please click "Verify Email Address" button at the top. If you have already verified your account, Please ignore this message. Thank you.
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

                if (!$mail->Send())
                {
                    header("Location: ../register_page.php?error=Sending email occured. please check your email." . $mail->ErrorInfo);
                    exit();
                }
                else
                {
                    date_default_timezone_set('Asia/Manila');
                    $notif_id = uniqid('NT');
                    $notif_title = "Your account has been <b>Created</b>";
                    $notif_desc = "Your account has been created and ready to go! Please check your email for verification link so you can start here!";
                    $notif_time = date("h:i A");
                    $notif_date = date("Y-m-d");
                    $viewed = "0";
                    $sql = "INSERT INTO notifications(notif_id, patient_id, notif_title, notif_desc, time, date, viewed) VALUES('$notif_id', '$Patient_Id', '$notif_title', '$notif_desc', '$notif_time', '$notif_date', '$viewed' )";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                      header("Location: ../login_page.php?success=Your account has been successfully created. Please check your email for verification link.");
                      exit();
                    }else{
                      echo "There is something wrong with adding shits";
                    }

                }

            }
            else
            {

                header("Location: ../register_page.php?error=Unknown error occured, please try again.");
                exit();

            }
        }
    }
}
else
{
    header("Location: ../register_page.php?error=Error Occured, Please try again.");
    exit();
}

?>
