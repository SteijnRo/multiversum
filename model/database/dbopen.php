<?php

include("config.php");

$dbaselink = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die("Failed to connect to the database server ") . mysqli_connect_error(1);

set_time_limit(60); // 60 second time limit

?> 