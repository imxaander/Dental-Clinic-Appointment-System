<?php
include "../includes/con_db.inc.php";

if (isset($_POST["Patient_Id"])) {
  $Patient_Id = $_POST["Patient_Id"];
  $sql = "UPDATE notifications SET viewed = '1' WHERE patient_id = '$Patient_Id'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    echo "notifs viewed";
  }
}

?>
