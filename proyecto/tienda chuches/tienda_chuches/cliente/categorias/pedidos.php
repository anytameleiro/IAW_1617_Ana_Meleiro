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
$user=$_SESSION["user"];
    include_once("../menu.php");
    echo "<h1>Pedidos</h1>";
    ?>
    <div class="titulo">
        <table >
       <tr>

         <th>Nombre</th>
         <th>Fecha</th>
         <th>Precio total</th>

       </tr>


    </div>
    <div class="contenido">

<?php
    //CREATING THE CONNECTION
    $connection = new mysqli("localhost", "root", "3546", "tienda_chuches");

    //TESTING IF THE CONNECTION WAS RIGHT
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }


    //MAKING A SELECT QUERY

    $con="SELECT * from pedido inner join
     contiene on contiene.id_pedido=pedido.id_pedido inner join chuches on chuches.id_chuche=contiene.id_chuche
     where pedido.apodo='$user';";

    if ($result = $connection->query($con)) {

      while($obj = $result->fetch_object()) {
    echo "<tr>";
   echo "<td><a href= 'descripcion.php?id=$obj->id_chuche'>".$obj->nombre_chu."</a></td>";
    echo "<td>".$obj->fecha."</td>";
    echo "<td>".$obj->precio_total."</td>";
    echo "</tr>";
   }

  unset($obj);
}else {

      echo "Error: ". $sql ."<br>". mysqli_error($connection);
}

  ?>


  </table>
  </div>

  <?php
  echo "<br><a href='perfil.php'>Atras</a>";

  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
