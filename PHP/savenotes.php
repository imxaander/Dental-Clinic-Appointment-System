<?php 
include "../includes/con_db.inc.php";
if (isset($_POST["Content"])) {
    date_default_timezone_set('Asia/Manila');
    $content = $_POST["Content"];
    $branch = $_POST["Branch"];
    $timenow = date("F j, Y, g:i a");
    $sql = "UPDATE oncall_appointments SET content = '$content', last_saved = '$timenow' WHERE branch = '$branch'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Successfully saved the note.";
    }
}
?>