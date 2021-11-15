<?php
include '../includes/con_db.inc.php';

if(isset($_POST["Staff_Id"])) {
  $Staff_Id = $_POST["Staff_Id"];

  $sql = "DELETE FROM staffs WHERE Staff_Id = '$Staff_Id'";
  $result = mysqli_query($con, $sql);

  if($result) {
    return "this is good";
    header("Location: /index.php");
    exit();
  }
}

 ?>
