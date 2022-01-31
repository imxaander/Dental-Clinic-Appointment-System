<?php
include "../includes/con_db.inc.php";
if (isset($_POST["service"])) {
  $service = $_POST["service"];
  $sql = "SELECT * FROM service WHERE service = '$service'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    while ($row = mysqli_fetch_array($result)) { ?>
      <br>
      <p style="text-align: center;" class="jgTitles2"> <b> <?php echo $row["service"] ?></b></p>

      <p style="margin: 10px; text-align: justify;" class="jgPara1">Description : <?php echo $row["description"] ?></p>
      <input type="hidden" name="Duration" value="<?php echo $row["duration"] ?>">

      <?php
    }
  }
  // code...
}
 ?>
