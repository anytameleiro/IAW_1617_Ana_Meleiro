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

    $con="SELECT * from chuches where id_chuche=".$_GET['id'];

    if ($result = $connection->query($con)) {

    $obj = $result->fetch_object();

    echo"<div class='login1'>";
    echo "<form method='post'>";
    echo"<div id='login2'>";
    echo "<h1>".ucwords(strtolower($obj->nombre_chu))."</h1><br>";
    echo"<table>";
    echo"<tr>";
    echo"<td>";

    echo "<img src='".$obj->img_chu."'/><br>";
    echo "<h2>".$obj->precio."€ </h2>";
    echo"<br><a id='atras' href='categoria1.php?idcat=$obj->id_categoria'>Atras<br></a>";
    echo"</td>";
    echo"<td>";
    echo "<div id='desc'>".$obj->descripcion."</div><br><br>";
    echo"Cantidad: <input type='number' min='1' name='cantidad' /> <br><br><br>";
    echo "<button name='edit'>Comprar</button>";
    // echo "<a id='atras'  href='pagar.php?id=$obj->id_chuche?total=$total'>Comprar<br></a>";
    echo"</td>";
    echo"</tr>";
    echo"</table>";

    echo"</div>";
    echo "</form>";
    echo"</div>";
  }else {

        echo "Error: ". $sql ."<br>". mysqli_error($connection);
  }

    if (isset($_POST['edit'])) {

      //variables
      // $apodo=$_SESSION["user"];

      // $fecha=date("Y-m-d") ;

      $cantidad= $_POST['cantidad'];
      $id=$_GET['id'];
      // $total=$_POST['cantidad']+$obj->precio;

      //consulta
      // $consulta= "INSERT INTO `pedido` (`id_pedido`, `apodo`, `fecha`, `precio_total`)
      // VALUES (NULL, '$apodo', '$fecha', '$total');";

      $consulta2= "INSERT INTO `contiene` (`id_pedido`, `id_chuche`, `cantidad`)
      VALUES (NULL, '$id', '$cantidad');";

      if ($result = $connection->query($consulta)){
        header ("Location: pagar.php");
      } else {
            echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }
        if ($result2 = $connection->query($consulta2)){
          header ("Location: pagar.php");
        } else {
              echo "Error: " . $result2 . "<br>" . mysqli_error($connection);
          }
    }

    $result->close();
    unset($obj);
    unset($connection);


  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
