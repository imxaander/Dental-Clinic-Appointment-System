<?php
include '../includes/con_db.inc.php';

if(isset($_POST["User_Name"])) {
  $User_Name = $_POST["User_Name"];
  $Password = $_POST["Password"];
  $Branch = $_POST["Branch"];
  $Staff_Id = uniqid('ST');
  $Verified = $_POST["Verified"];

  $sql = "INSERT INTO staffs(Staff_Id, Verified, User_Name, Password, Branch) VALUES('$Staff_Id', '$Verified', '$User_Name', '$Password', '$Branch')";
  $result = mysqli_query($con, $sql);

  if($result) {
    header("Location : /index.php");
    exit();
  }
}

 ?>
