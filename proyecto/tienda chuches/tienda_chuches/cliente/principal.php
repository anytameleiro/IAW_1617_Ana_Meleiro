<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="menu/menu.css">

  <title>TODO CHUCHES</title>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {
    //SESSION ALREADY CREATED
    //SHOW SESSION DATA
    var_dump($_SESSION);
    include_once("menu/menu.php");
  } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>
</body>
</html>
