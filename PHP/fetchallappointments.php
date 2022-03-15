<?php
include "../includes/con_db.inc.php";
if (isset(($_POST["Patient_Id"]))) {
  #monday tuesday friday sat sun
  $Patient_Id = $_POST["Patient_Id"];

  $sql = "SELECT * FROM appointments ORDER BY Status DESC";
  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($result))
  { ?>

              <div type="button" class="collapsible" data-role="loadinfo" data-id="<?php echo $row["Appointment_Id"] ?>"> <?php echo $row["Service"]; ?> | <?php echo $row["Date"]; ?> , <?php echo $row["Time"]; ?> | Status :

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
          echo '<span style="color: #32CD32">' . $row["Status"] . "</span>";
      }
      elseif ($row["Status"] == "Alert")
      {
          echo '<span style="color: Orange">' . $row["Status"] . "</span>";
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
