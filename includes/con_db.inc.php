<?php

$sname= "localhost";
$uname= "root";
$pword= "jgonzales2022";
$dbname= "appointment_system";

$con = mysqli_connect($sname, $uname, $pword, $dbname);

if (!$con) {
    echo "Connection Failed!";
}

?>
