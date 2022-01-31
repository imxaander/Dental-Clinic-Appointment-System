<?php
include "../includes/con_db.inc.php";
if(isset($_GET["Branch"])){
$branch = $_GET["Branch"];
$sql = "SELECT * FROM appointments WHERE Status = 'Ongoing' AND Branch = '$branch'";
$result = mysqli_query($con, $sql);

date_default_timezone_set('Asia/Manila');

foreach($result as $row){
    $ntime = date("h:i A", strtotime($row["Time"]." + 0 hours"));
    $ytime = date("h:i A", strtotime($row["Time"]." + ".$row["duration"]));
    $etime = date("h:i A", strtotime($ytime." + 0 hours"));
    $date = $row["Date"];

    $data[] = array(
        'id' => $row["Appointment_Id"],
        'title' => $row["Service"],
        'start' => date("c", strtotime($date." ".$ntime)),
        'end' => date("c", strtotime($date." ".$etime)),
        'description' => date("c", strtotime($date." ".$ntime)) . date("c", strtotime($date." ".$etime))
    );
}
echo json_encode($data);
}else{
echo "haha login ka muna";
}
