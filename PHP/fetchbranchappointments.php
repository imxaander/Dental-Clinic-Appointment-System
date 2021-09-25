<?php
include "../includes/con_db.inc.php";
if (isset(($_POST["Branch"]))) {
  #monday tuesday friday sat sun
  $Branch = $_POST["Branch"];

  if ($Branch != 'All') {
    $sql = "SELECT * FROM appointments WHERE Branch = '$Branch' ORDER BY Status DESC";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result))
    { ?>

                <div type="button" class="collapsible" data-role="loadinfo" data-id="<?php echo $row["Appointment_Id"] ?>"><?php echo $row["Service"]; ?> | <?php echo $row["Date"]; ?> , <?php echo $row["Time"]; ?> | Status :
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
  }else{
      $sql = "SELECT * FROM appointments ORDER BY Status DESC";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_array($result))
      { ?>

                  <div type="button" class="collapsible" data-role="loadinfopatient" data-id="<?php echo $row["Appointment_Id"] ?>"><?php echo $row["Service"]; ?> | <?php echo $row["Date"]; ?> , <?php echo $row["Time"]; ?> | Status :
          <?php if ($row["Status"] == "Pending")
          {
              echo '' . $row["Status"] . "";
          }
          elseif ($row["Status"] == "Canceled")
          {
              echo '' . $row["Status"] . "";
          }
          elseif ($row["Status"] == "Ongoing")
          {
              echo '' . $row["Status"] . "";
          }
          elseif ($row["Status"] == "Done")
          {
              echo '' . $row["Status"] . "";
          }
          else
          {
              echo "Unable to get status";
          } ?>

        </div>





        <?php
    }
  }

}


  ?>
