<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../menu.css">

  <title>TODO CHUCHES</title>

</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {

    include_once("../menu.php");
    echo "<h1>Mi perfil</h1>";


    //CREATING THE CONNECTION
    $connection = new mysqli("localhost", "root", "3546", "tienda_chuches");

    //TESTING IF THE CONNECTION WAS RIGHT
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }

    //MAKING A SELECT QUERY

    $consulta="SELECT * from clientes where apodo=".$_POST["user"];

    if ($result = $connection->query($consulta)) {
    }else {

          echo "Error: ". $sql ."<br>". mysqli_error($connection);
    }
    $obj = $result->fetch_object();

    echo "<h2>".$obj->nombre."</h2><br>";
    echo "<h2>".$obj->apodo."</h2><br>";
    echo "<h2>".$obj->direccion."</h2><br>";

  unset($obj);





  } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>
</body>
</html>
