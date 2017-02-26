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
$user=$_SESSION["user"];

    //MAKING A SELECT QUERY

    $consulta="SELECT * from cliente where apodo='$user';";

    if ($result = $connection->query($consulta)) {
    }else {

          echo "Error: ". $sql ."<br>". mysqli_error($connection);
    }
    $obj = $result->fetch_object();

    echo "<strong>Apodo: </strong>".$obj->apodo."<br><br>";
    echo "<strong>Nombre: </strong>".$obj->nombre."<br><br>";
    echo "<strong>Apellidos: </strong>".$obj->apellidos."<br><br>";
    echo "<strong>Direccion: </strong>".$obj->direccion."<br><br>";
    echo "<strong>Email: </strong>".$obj->email."<br><br>";

  unset($obj);
echo"<a href='modi.php?apo=$user'>Modificar perfil</a><br>";
echo"<a href='contrasenia.php?apo=$user'>Cambiar contraseña</a><br>";
echo"<a href='pedidos.php'>Pedidos</a>";



  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
