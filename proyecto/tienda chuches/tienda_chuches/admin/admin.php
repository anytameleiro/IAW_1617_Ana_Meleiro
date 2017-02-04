<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador</title>

</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["admin"])) {

    ?>
    <h1>Bienvenido administrador</h1>
    <a href="chuches/chuches.php">tabla chuches</a>
    <?php
    } else {
    session_destroy();
    header("Location: ../login.php");
    }


    ?>
    </body>
    </html>
