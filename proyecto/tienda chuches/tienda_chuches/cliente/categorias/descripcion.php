<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../menu.css">
  <link rel="stylesheet" type="text/css" href="categoria.css">
  <link rel="shortcut icon" href="../../img/logo.ico">
  <title>TODO CHUCHES</title>
    <style>

  img {
  	width: 300px;
  	border-radius: 10px;
  }
  </style>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {
    //SESSION ALREADY CREATED

    include_once("../menu.php");

    include_once("../connection.php");


    //MAKING A SELECT QUERY

    $con="SELECT * from chuches where id_chuche=".$_GET['id'];

    if ($result = $connection->query($con)) {

    $obj = $result->fetch_object();

    echo"<div class='login1'>";
    echo "<form method='post'>";
    echo"<div id='login2'>";
    echo"<table id='table'>";

    echo"<tr>";
    echo"<td id='td'>";
    echo "<h1>".ucwords(strtolower($obj->nombre_chu))."</h1><br>";

    echo "<img src='".$obj->img_chu."'/><br>";
    echo "<h2>".$obj->precio."€ </h2>";
    echo"<br><a id='atras' href='categoria1.php?idcat=$obj->id_categoria'>Atras<br></a>";
    echo"</td>";
    echo"<td id='td'>";
    echo "<div id='desc'>".$obj->descripcion."</div><br><br>";
    echo"Cantidad: <input type='number' min='1' max='20' name='cantidad' required/> <br><br><br>";
    echo "<button id='atras' name='edit'>Comprar</button>";
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
      $apodo=$_SESSION["user"];

      $fecha=date("Y-m-d") ;

      $cantidad= $_POST['cantidad'];
      $id=$_GET['id'];
      $precio=$obj->precio;
      $total=(floatval($cantidad)*floatval($precio));



      $consulta= "INSERT INTO `pedido` (`id_pedido`, `apodo`, `fecha`, `precio_total`)
      VALUES (NULL, '$apodo', '$fecha', '$total');";

      if ($result = $connection->query($consulta)){

        $pedido="SELECT * FROM pedido ORDER BY id_pedido DESC LIMIT 0, 1";
        $result2 = $connection->query($pedido);
        $obj2=$result2->fetch_object();
        $pedido1 = $obj2-> id_pedido;

        $consulta2= "INSERT INTO `contiene` (`id_pedido`, `id_chuche`, `cantidad`) VALUES ('$pedido1', '$id', '$cantidad');";
  // var_dump($consulta2);

        if ($result2 = $connection->query($consulta2)){

          header ("Location: pagar.php?idped=$pedido1");
        } else {
              echo "Error: " . $result2 . "<br>" . mysqli_error($connection);
          }
      } else {
            echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }

    }
include_once("../info.php");
    unset($obj);
    unset($connection);


  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
