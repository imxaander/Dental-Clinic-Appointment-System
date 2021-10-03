<?php

$sname= "sql6.freemysqlhosting.net";
$uname= "sql6441996";
$pword= "TfGhZp2LeG";
$dbname= "sql6441996";

$con = mysqli_connect($sname, $uname, $pword, $dbname);

if (!$con) {
    echo "Connection Failed!";
}

?>
