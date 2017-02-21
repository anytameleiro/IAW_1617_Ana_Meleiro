<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../menu.css">
<link rel="stylesheet" type="text/css" href="descripcion.css">
  <title>TODO CHUCHES</title>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {
    //SESSION ALREADY CREATED

    include_once("../menu.php");

    //CREATING THE CONNECTION
    $connection = new mysqli("localhost", "root", "3546", "tienda_chuches");

    //TESTING IF THE CONNECTION WAS RIGHT
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }

    //MAKING A SELECT QUERY

    $consulta="SELECT * from chuches where id_chuche=".$_GET['id'];

    if ($result = $connection->query($consulta)) {
    }else {

          echo "Error: ". $sql ."<br>". mysqli_error($connection);
    }
    $obj = $result->fetch_object();
    echo"<div class='login1'>";
    echo"<div id='login2'>";
    echo"<table>";
    echo"<tr>";
    echo"<td>";
    echo "<h1>".ucwords(strtolower($obj->nombre_chu))."</h1><br>";
    echo "<img src='".$obj->img_chu."'/><br>";
    echo "<h2>".$obj->precio."€ </h2>";
    echo"</td>";
    echo"<td>";
    echo "<span>".$obj->descripcion."</span>";
    echo"</td>";
    echo"</tr>";
    echo"</table>";
    echo"</div>";
    echo"</div>";


    $result->close();
    unset($obj);
    unset($connection);


  } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>
</body>
</html>
