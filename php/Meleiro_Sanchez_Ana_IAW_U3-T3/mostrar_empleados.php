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
        $consulta="SELECT empleados.* from empleados inner join intervienen on intervienen.CodEmpleado=empleados.CodEmpleado where intervienen.IdReparacion=".$_GET['id'];
        mysqli_set_charset($conexion,"utf8");

        //variable de filas que tiene.
        $resultado=mysqli_query($conexion,$consulta);
        $num=mysqli_num_rows($resultado);
     
        // Si hay filas mostrar la tabla.
        if($num > 0){
         
          ?>
      <!-- Crear la tabla para asignar los empleados.-->

      <table style="border:1px solid black">
            <tr>
               <th>CodEmpleado</th>
               <th>DNI</th>
               <th>Nombre</th>
               <th>Apellidos</th>
                <th>Direccion</th>
               <th>Telefono</th>
               <th>CP</th>
               <th>FechaAlta</th>
               <th>Categoria</th>
               
          </tr>
          <?php
          //si tiene contenido, lo agregara.
          while ($fila=mysqli_fetch_array($resultado)){
            echo "<tr><td>";
            echo $fila['CodEmpleado']."</td><td>";
            echo $fila['DNI']."</td><td>";
            echo $fila['Nombre']."</td><td>";
            echo $fila['Apellidos']."</td><td>";
              echo $fila['Direccion']."</td><td>";
            echo $fila['Telefono']."</td><td>";
            echo $fila['CP']."</td><td>";
              echo $fila['FechaAlta']."</td><td>";
              echo $fila['Categoria']."</td>";
              
            echo "</tr>";
          }
          echo "</table><br>";
        
        }
      //Volver a la página principal.
        echo "<br><br> <form action='reparaciones.php'><input     type='submit' value='Atras' /></form>";
       ?>

  </body>
</html>