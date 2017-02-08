<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="">

  <title>TODO CHUCHES</title>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {
    //SESSION ALREADY CREATED
  
    include_once("menu.php");
    echo "<h1>caramelos</h1>";
  } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>
</body>
</html>
