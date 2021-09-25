<?php
include "../includes/con_db.inc.php";
if (isset($_POST["service"])) {
  $service = $_POST["service"];
  $sql = "SELECT * FROM service WHERE service = '$service'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    while ($row = mysqli_fetch_array($result)) { ?>

      <p style="text-align: center;"> <b> <?php echo $row["service"] ?></b></p>
      <p style="margin: 10px;">Type : <?php echo $row["type"] ?></p>
      <?php if (!empty($row["fixed_price"])){ ?>
        <p style="margin: 20px; " >Fixed Price : <?php echo $row["fixed_price"] ?></p>
      <?php }?>
      <?php if (!empty($row["estimated_price"])){ ?>
        <p style="margin: 20px;" >Starting <?php echo $row["estimated_price"] ?></p>
      <?php }?>
      <p style="margin: 10px;">Description : <?php echo $row["description"] ?></p>
      <input type="hidden" name="Duration" value="<?php echo $row["estimated_duration"] ?>">
      <input type="hidden" name="Cost" id="Cost" value="<?php echo $row["estimated_price"] ?>">
      <?php
    }
  }
  // code...
}
 ?>
