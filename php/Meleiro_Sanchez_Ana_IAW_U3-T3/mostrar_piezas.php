<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    table,td,th{
        border: black 2px solid ;
        text-align:center;
        border-collapse: collapse;
      }
      td{
        padding: 2px 5px;
      }
    </style>
  </head>
  <body>
     <?php
         //Crear conexion.
        $conexion=new mysqli("localhost", "root", "3546", "tf");
      //Prueba conexion correcta.
      if ($conexion->connect_errno) {
          printf("Connection failed: %s\n", $conexion->connect_error);
         exit();
      }
        $recambios="SELECT recambios.* FROM recambios JOIN incluyen ON recambios.IdRecambio=incluyen.IdRecambio WHERE incluyen.IdReparacion=".$_GET['id'];
        mysqli_set_charset($conexion,"utf8");
       
      //variable de filas que tiene.
        $resultado=mysqli_query($conexion,$recambios);
        $num=mysqli_num_rows($resultado);
        mysqli_close($conexion);

        // Si hay filas mostrar la tabla.
        if($num > 0){
        ?>
      <table>
          <tr>
               <th>IdRecambio</th>
               <th>Descripcion</th>
               <th>UnidadBase</th>
               <th>Stock</th>
               <th>PrecioReferencia</th>
          </tr>
      <?php
         //si tiene contenido, lo agregara.
          while ($fila=mysqli_fetch_array($resultado)){
            echo "<tr><td>";
            echo $fila['IdRecambio']."</td><td>";
            echo $fila['Descripcion']."</td><td>";
            echo $fila['UnidadBase']."</td><td>";
            echo $fila['Stock']."</td><td>";
            echo $fila['PrecioReferencia']."</td>";
            echo "</tr>";
          }
          echo "</table><br>";
        }
      //Volver a la página principal.
        echo "<br><br> <form action='reparaciones.php'><input     type='submit' value='Atras' /></form>";
       ?>

     
  </body>
</html>