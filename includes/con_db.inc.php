<?php

$sname= "databases.000webhost.com";
$uname= "id17739275_admin";
$pword= "yZDJHN9a%u5_pQn";
$dbname= "id17739275_appointment_system";

$con = mysqli_connect($sname, $uname, $pword, $dbname);

if (!$con) {
    echo "Connection Failed!";
}

?>
