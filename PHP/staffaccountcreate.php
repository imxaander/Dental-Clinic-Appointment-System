<?php
include '../includes/con_db.inc.php';

if(isset($_POST["User_Name"])) {
  $User_Name = $_POST["User_Name"];
  $Password = $_POST["Password"];
  $Branch = $_POST["Branch"];
  $Staff_Id = uniqid('ST');
  $Verified = $_POST["Verified"];
  $Image = "https://www.pngkit.com/png/detail/301-3011853_brue-blank-person.png";
  $sql = "INSERT INTO staffs(Staff_Id, Verified, User_Name, Password, Branch, Image) VALUES('$Staff_Id', '$Verified', '$User_Name', '$Password', '$Branch', '$Image')";
  $result = mysqli_query($con, $sql);

  if($result) {
    header("Location: /index.php");
    exit();
  }else{
    echo mysqli_error($con);
  }
}else{
  echo "username no post";
}

 ?>
