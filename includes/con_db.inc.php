<?php


//values
$sname= "localhost";
$uname= "root";
$pword= "";
$dbname= "appointment_system";

$con = mysqli_connect($sname, $uname, $pword, $dbname);

if (!$con) {
    echo "Connection Failed!";
}
?>
