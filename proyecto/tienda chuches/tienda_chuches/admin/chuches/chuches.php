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
      td{
        font-size: 11px;
          padding: 5px;
        }
      th{
        font-size: 15px;
          padding: 8px;
      }

      img{
          width: 55px;
      }
      #desc{
        width: 250px;
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
         <th>Idcategoria</th>
         <th>Nombre</th>
         <th>Descripcion</th>
         <th>precio</th>
         <th>Imagen_1</th>
         <th>Imagen_2</th>
         <th>Imagen_3</th>
         <th>Imagen_4</th>
         <th>Modificar</th>
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

            echo "Error: ". $sql ."<br>". mysqli_error($connection);
      }
      //Introducir los datos en la tabla.
      while($obj = $result->fetch_object()) {

              echo "<tr>";
              echo "<td>".$obj->id_chuche."</td>";
              echo "<td>".$obj->id_categoria."</td>";
              echo "<td>".$obj->nombre_chu."</td>";
              echo "<td id='desc'>".$obj->descripcion."</td>";
              echo "<td>".$obj->precio." € </td>";
              if (is_null($obj->img_chu)){
                echo "<td><span>Sin Imagen</span></td>";
              }else{
                echo '<td><img src="../'.$obj->img_chu.'"/></td>';
              }
              if (is_null($obj->img1_chu)){
                echo "<td><span>Sin Imagen</span></td>";
              }else{
                echo '<td><img src="../'.$obj->img1_chu.'"/></td>';
              }
              if (is_null($obj->img2_chu)){
                echo "<td><span>Sin Imagen</span></td>";
              }else{
                echo '<td><img src="../'.$obj->img2_chu.'"/></td>';
              }
              if (is_null($obj->img3_chu)){
                echo "<td><span>Sin Imagen</span></td>";
              }else{
                echo '<td><img src="../'.$obj->img3_chu.'"/></td>';
              }
              //modificar
              echo "<td><form id='form1' method='get'>
                    <a href='modificarchuche.php?id=$obj->id_chuche'/>
                    <img src='../img/modificar.png'/></a>
                    </form></td>";
              //Borrar.
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
    echo "<br><form action='../admin.php'>
          <input type='submit' value='Atras' />
          </form>";
  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
