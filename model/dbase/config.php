<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "multiverse";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>