<?php
include "../includes/con_db.inc.php";
if (isset(($_POST["Patient_Id"]))) {
  #monday tuesday friday sat sun
  $Patient_Id = $_POST["Patient_Id"];

  $sql = "SELECT * FROM appointments WHERE Patient_Id = '$Patient_Id' ORDER BY Status DESC";
  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($result))
  { ?>

              <div type="button" class="collapsible" data-role="loadinfopatient" data-id="<?php echo $row["Appointment_Id"] ?>"> <?php echo $row["Service"]; ?> | <?php echo $row["Date"]; ?> , <?php echo $row["Time"]; ?> | Status :

      <?php if ($row["Status"] == "Pending")
      {
          echo '<span style="color: yellow">' . $row["Status"] . "</span>";
      }
      elseif ($row["Status"] == "Canceled")
      {
          echo '<span style="color: Red">' . $row["Status"] . "</span>";
      }
      elseif ($row["Status"] == "Ongoing")
      {
          echo '<span style="color: Blue">' . $row["Status"] . "</span>";
      }
      elseif ($row["Status"] == "Done")
      {
          echo '<span style="color: Green">' . $row["Status"] . "</span>";
      }
      else
      {
          echo "Unable to get status";
      } ?>
    </div><br>





          <?php
  }
}

  ?>
