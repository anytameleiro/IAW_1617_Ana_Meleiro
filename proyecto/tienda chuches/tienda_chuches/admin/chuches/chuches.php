<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla chuches</title>
  <style>
      table,td,th{
          border: black 1px solid ;
          text-align:center;
          border-collapse: collapse;
      }
      td,th{
        font-size: 15px;
          padding: 5px;
        }


      img{
          width: 42px;
          height: 42px;
      }
      </style>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["admin"])) {

    ?>
    <h1>Tabla chuches</h1>

      <table>
       <tr>
         <th>Idchuche</th>
         <th>Nombre</th>
         <th>Descripcion</th>
         <th>Imagen1</th>
         <th>Imagen2</th>
         <th>Imagen3</th>
         <th>Imagen4</th>
         <th>Imagen5</th>
         <th>precio</th>
         <th>Modificar</th>
         <!-- <th>Asignar_Empleados</th>

        <th>Mostrar_Empleados</th> -->
         <th>Borrar</th>
       </tr>

    <?php
     //Crear conexion.
     $connection = new mysqli("localhost", "root", "3546", "tienda_chuches");
     //Prueba conexion correcta.
     if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //Consulta.
      if ($result = $connection->query("SELECT * FROM chuches;")) {
      } else {

            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      }
      //Introducir los datos en la tabla.
      while($obj = $result->fetch_object()) {
              echo "<tr>";
              echo "<td>".$obj->id_chuche."</td>";
              echo "<td>".$obj->nombre_chu."</td>";
              echo "<td>".$obj->descripcion."</td>";
              echo "<td>".$obj->img_chu."</td>";
              echo "<td>".$obj->img1_chu."</td>";
              echo "<td>".$obj->img2_chu."</td>";
              echo "<td>".$obj->img3_chu."</td>";
              echo "<td>".$obj->img4_chu."</td>";
              echo "<td>".$obj->precio." € </td>";

              echo "<td><form id='form1' method='get'>
                    <a href='modificarchuche.php?id=$obj->id_chuche'/>
                    <img src='../img/modificar.png'/></a>
                    </form></td>";
              //Borrar la reparacion.
              echo "<td><form id='form0' method='get'>
                    <a href='borrarchuche.php?id=$obj->id_chuche'>
                    <img src='../img/papelera.png'/></a>
                    </form></td>";
              echo "</tr>";
         }
          //Cerrar la conexion.
          $result->close();
          unset($obj);
          unset($connection);
          ?>

   </table>

    <?php
  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
