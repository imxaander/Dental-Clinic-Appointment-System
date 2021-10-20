<?php

$sname= "49c2-136-158-3-111.ngrok.io";
$uname= "root";
$pword= "";
$dbname= "appointment_system";

$con = mysqli_connect($sname, $uname, $pword, $dbname);

if (!$con) {
    echo "Connection Failed!";
}

?>
