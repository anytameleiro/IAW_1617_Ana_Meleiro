<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../estilotabla.css">
  <title>Tabla chuches</title>
  <style>


      img{
          width: 55px;
      }

      </style>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["admin"])) {
$categoria = $_GET['idcat'];
    ?>
    <a id="salir" href='../../salir.php' >Cerrar sesion</a>
    <h1>Tabla chuches</h1>
    <?php
    //Crear conexion.
    $connection = new mysqli("localhost", "root", "3546", "tienda_chuches");
    //Prueba conexion correcta.
    if ($connection->connect_errno) {
         printf("Connection failed: %s\n", $connection->connect_error);
         exit();
     }
     $consulta="SELECT * from chuches inner join
      categoria on categoria.id_categoria=chuches.id_categoria where categoria.id_categoria='$categoria' ORDER BY chuches.nombre_chu;";

     ?>
    <div class="titulo">
        <table >
       <tr>
         <th>Categoria</th>
         <th>Nombre</th>
         <th>Descripcion</th>
         <th>Precio</th>
         <th>Imagen</th>
         <th>Modificar</th>
         <th>Borrar</th>
       </tr>

     </table>
    </div>
    <div class="contenido">
    <table>
      <tbody>

    <?php

      //Consulta.
      if ($result = $connection->query($consulta)) {
      } else {

            echo "Error: ". $sql ."<br>". mysqli_error($connection);
      }


      //Introducir los datos en la tabla.
      while($obj = $result->fetch_object()) {

              echo "<tr>";
              echo "<td>".$obj->nombre_cat."</td>";
              echo "<td>".$obj->nombre_chu."</td>";
              echo "<td>".$obj->descripcion."</td>";
              echo "<td>".$obj->precio." € </td>";
              if (!empty($obj->img_chu)){
                echo '<td><img src="'.$obj->img_chu.'"/></td>';
              }else{
                echo "<td><span>Sin Imagen</span></td>";
              }

              //modificar
              echo "<td>
                    <a href='modificarchuche.php?id=$obj->id_chuche'/>
                    <img src='../img/modificar.png'/></a>
                    </td>";
              //Borrar.
              echo "<td>
                    <a href='borrarchuche.php?id=$obj->id_chuche'>
                    <img src='../img/papelera.png'/></a>
                  </td>";
              echo "</tr>";
         }

          //Cerrar la conexion.
          $result->close();
          unset($obj);
          unset($connection);
          ?>

        </tbody>
         </table>
       </div>

    <?php



    echo "<br><a href='añadirchuche.php?idcat=$categoria'><input  id='entrar' type='submit' value='+ Añadir' /></a><br>";

    echo "<br><a class='atras' href='../categorias/categoria.php'>Atras</a>";
  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
