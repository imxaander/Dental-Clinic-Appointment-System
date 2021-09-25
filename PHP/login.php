<?php
#session will start here

session_start();
include "../includes/con_db.inc.php";

#if values posted by the form is set / exists (isset())
if(isset($_POST['Email']) && isset($_POST['Password'])){

    #data validation function (prevent executing of codes inside the values posted)
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    #validating the email and password
    $Email = validate($_POST['Email']);
    $Password = validate($_POST['Password']);

    #check if there are values remained after the validation
    if (empty($Email)) {
		header("Location: ../login_page.php?error=User Name is required");
	    exit();
	}else if(empty($Password)){
        header("Location: ../login_page.php?error=Password is required");
	exit();

    }else{
        #convert password to hash md5 for security

        //$password = md5($password);

        #select from patient accounts where
        $sql = "SELECT * FROM patients WHERE Email = '$Email' AND Password = '$Password'";

        #query / request to run SQL command with the database
        $result = mysqli_query($con, $sql);

        #select from admin accounts where
        $sql1 = "SELECT * FROM staffs WHERE User_Name = '$Email' AND Password = '$Password'";

        #query / request to run SQL command with the database



        #if the rows that contain the result of sql is equal to 1
        if (!$result || mysqli_num_rows($result) === 1) {

            #getting the associative array of the row
            $row = mysqli_fetch_assoc($result);

            #if the array's email is equal to your email and vice versa, run the code below
            if ($row['Email'] === $Email && $row['Password'] === $Password){

            #sets the session's informations to what that array have.(basically getting the patient infos and set it to session)
            $_SESSION['Patient_Id'] = $row['Patient_Id'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['Last_Name'] = $row['Last_Name'];
            $_SESSION['First_Name'] = $row['First_Name'];
            $_SESSION['Middle_Name'] = $row['Middle_Name'];
            $_SESSION['Gender'] = $row['Gender'];
            $_SESSION['Age'] = $row['Age'];
            $_SESSION['Civil_Status'] = $row['Civil_Status'];
            $_SESSION['Contact_No'] = $row['Contact_No'];
            $_SESSION['Occupation'] = $row['Occupation'];
            $_SESSION['Address'] = $row['Address'];
            $_SESSION['Branch'] = $row['Branch'];
            $_SESSION['Image'] = $row['Image'];
            $_SESSION['Date_of_Birth'] = $row['Date_of_Birth'];
            $_SESSION['Verified'] = $row['Verified'];
            $_SESSION['chat_id'] = $row['chat_id'];
            #sets location to homepage
            header("Location: ../index.php");
            exit();
            }

        #else if the rows that contain the result of sql1 is equal to 1
        }else if($result1 = mysqli_query($con, $sql1)){

            if(mysqli_num_rows($result1) === 1){

            #getting the associative array of the row
            $row1 = mysqli_fetch_assoc($result1);

            #if the array's email is equal to your email and vice versa, run the code below
            if ($row1['User_Name'] === $Email && $row1['Password'] === $Password){

                #sets the session's informations to what that array have.
                $_SESSION['Staff_Id'] = $row1['Staff_Id'];
                $_SESSION['Email'] = $row1['User_Name'];
                $_SESSION['Branch'] = $row1['Branch'];
                $_SESSION['Image'] = $row1['Image'];
                $_SESSION['Verified'] = $row1['Verified'];

                #sets location to homepage
                header("Location: ../index.php");
                exit();
                }else{
                    header("Location: ../login_page.php?error=Incorrect Username or Password");
            exit();
                }
            }else{
                header("Location: ../login_page.php?error=Incorrect Username or Password");
            exit();
            }
        }else{

            header("Location: ../login_page.php?error=Incorrect Username or Password");
            exit();
        }
    }
}else{

    header("Location: ../login_page.php?error=Error occured, please try again.");
    exit();
}
?>
