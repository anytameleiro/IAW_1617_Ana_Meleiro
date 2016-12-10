<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    table,td,th{
        border: black 2px solid ;
        text-align:center;
        border-collapse: collapse;
    }
    td{
        padding: 5px;
      }
    .averia{
        text-align: left;
    }
        
    img{
        width: 42px;
        height: 42px;
    }
        
    
    </style>
  </head>
  <body>
    <table>
     <thead>
       <tr>
         <th>IdReparacion</th>
         <th>Matricula</th>
         <th>Fecha_Entrada</th>
         <th>Kilometros</th>
         <th>Avería</th>
         <th>Fecha_Salida</th>
         <th>Reparado</th>
         <th>Observaciones</th>
         <th>Asignar_Empleados</th>
         <th>Mostrar_Piezas</th>
        <th>Mostrar_Empleados</th>
         <th>Borrar</th>
      </thead>
    <?php
     //Crear conexion.
     $connection = new mysqli("localhost", "root", "3546", "tf");
     //Prueba conexion correcta.
     if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //Consulta para sacar las reparaciones.
      if ($result = $connection->query("SELECT * FROM reparaciones;")) {
      } else {

            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      }
      //Introducir los datos en la tabla.
      while($obj = $result->fetch_object()) {
              echo "<tr>";
              echo "<td>".$obj->IdReparacion."</td>";
              echo "<td>".$obj->Matricula."</td>";
              echo "<td>".$obj->FechaEntrada."</td>";
              echo "<td>".$obj->Km."</td>";
              echo "<td class='averia'>".$obj->Averia."</td>";
              echo "<td>".$obj->FechaSalida."</td>";
              echo "<td>".$obj->Reparado."</td>";
              echo "<td>".$obj->Observaciones."</td>";
              
              //asignar empleados.
              echo "<td><form id='form4' width = '50px' method='get'>
                    <a href='asignar_empleados.php?id=$obj->IdReparacion'>
                    <img src='Icono_Persona.png'/></a>
                    </form></td>";
              //mostrar piezas.
              echo "<td><form id='form1' method='get'>
                    <a href='mostrar_piezas.php?id=$obj->IdReparacion'/>
                    <img src='herramientas.png'/></a>
                    </form></td>";
              //mostrar empleados.
              echo "<td><form id='form1' method='get'>
                    <a href='mostrar_empleados.php?id=$obj->IdReparacion'/>
                    <img src='mostrarpersona.png'/></a>
                    </form></td>";
              //Borrar la reparacion.
              echo "<td><form id='form0' method='get'>
                    <a href='borrar.php?id=$obj->IdReparacion'>
                    <img src='papelera.png'/></a>
                    </form></td>";
              echo "</tr>";
         }
          //Cerrar la conexion.
          $result->close();
          unset($obj);
          unset($connection);
          ?>
     <br>
   </table>
  </body>
</html>
