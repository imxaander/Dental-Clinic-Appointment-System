<?php

$sname= "bmcyt4tdmy8gezphoedx-mysql.services.clever-cloud.com";
$uname= "unsmamkc9ng9ew7d";
$pword= "jROOddKy0Sm53e6hPX97";
$dbname= "bmcyt4tdmy8gezphoedx";

$con = mysqli_connect($sname, $uname, $pword, $dbname);

if (!$con) {
    echo "Connection Failed!";
}

?>
