<?php


include "../includes/con_db.inc.php";
date_default_timezone_set('Asia/Manila');
$chat_id = $_POST["chat_id"];

$sql = "SELECT * FROM chat_app WHERE chat_id = '$chat_id' ORDER BY timestamp ASC";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {?>
    <?php  if (substr($row["author_id"], 0, 2) == 'PT')  { ?>

    <div class="Patient_Message Message">


    <p class="message-content-name jgPara3"><?php echo $row["display_name"] ?></p>
    <p class="message-content-body jgPara2"><?php echo $row['message_content'] ?></p>

    <p class="message-content-timestamp jgPara3"><?php if (date("Y-m-d",$row["timestamp"]) == date("Y-m-d")) {
      echo 'Today, ';
    }elseif (date("Y-m-d", $row["timestamp"]) == date("Y-m-d", strtotime("-1 days"))){
      echo 'Yesterday, ';
    }else{
      echo date("Y-m-d", $row["timestamp"]);
    } ?> <?php echo  date("h:i:s a",$row["timestamp"]); ?> </p>
    </div>
    <br>


  <?php }else{?>
    <div class="Staff_Message Message">


    <p class="message-content-name jgPara3"><?php echo $row["display_name"] ?></p>
    <p class="message-content-body jgPara2" jgPara1><?php echo $row['message_content'] ?></p>

    <p class="message-content-timestamp jgPara3"><?php if (date("Y-m-d",$row["timestamp"]) == date("Y-m-d")) {
      echo 'Today, ';
    }elseif (date("Y-m-d", $row["timestamp"]) == date('Y-m-d', strtotime("-1 days"))){
      echo 'Yesterday, ';
    }else{
      echo date("Y-m-d", $row["timestamp"]);
    } ?> <?php echo  date("h:i:s a",$row["timestamp"]); ?> </p>
    </div>
    <br>

  <?php } ?>
<?php
  }
}

 ?>
