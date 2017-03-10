<?php

//CREATING THE CONNECTION
$connection = new mysqli("fdb17.awardspace.net", "2314676_chuches", "12345678.t", "2314676_chuches");
// mysqli_set_charset("utf8",$connection);
//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}


?>
