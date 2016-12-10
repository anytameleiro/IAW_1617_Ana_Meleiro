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
      </style>
 </head>
    
<body>
<?php
//Crear conexion.
$connection = new mysqli("localhost", "root", "3546", "tf");
//Prueba conexion correcta.
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}
//Transformar $_GET en IdReparacion.
foreach ($_GET as $key => $item)

?>
<!-- Crear la tabla para asignar los empleados.-->
<form id='form' method='post' name='a'/>
<table style="border:1px solid black">
     <tr>
       <th>CodEmpleado</th>
       <th>DNI</th>
       <th>Nombre</th>
       <th>Apellidos</th>
       <th>Telefono</th>
       <th>CP</th>
       <th>FechaAlta</th>
       <th>Categoría</th>
       <th>Asignar</th>
    </tr>
<?php
   //Consulta para sacar los empleados.
if ($result = $connection->query("SELECT * FROM empleados;")) {
  while($obj = $result->fetch_object()) {
      //Introducir los datos en la tabla.
      echo "<tr><td>".$obj->CodEmpleado."</td>";
      echo "<td>".$obj->DNI."</td>";
      echo "<td>".$obj->Nombre."</td>";
      echo "<td>".$obj->Apellidos."</td>";
      echo "<td>".$obj->Telefono."</td>";
      echo "<td>".$obj->CP."</td>";
      echo "<td>".$obj->FechaAlta."</td>";
      echo "<td>".$obj->Categoria."</td>";
      //Un checkbox del CodEmpleado.
      echo "<td><input type='checkbox' name='a[]' value=".$obj->CodEmpleado."> </td>";
      echo "</tr>";
    }
    //Cerrar tabla, resultado.
    $result->close();
    unset($obj);
    //Boton para añadir.
    echo "</table><br><input type='submit' name='anadir' value='Asignar'/>
    </form>";
  } else {
        mysqli_error($connection);
  }
//Presionar añadir.
if (isset($_POST['anadir'])) {
  echo "<br>Empleado/s ";
  //Usar los checkboxs marcados.
  foreach ($_POST['a'] as $key => $item1) {
    //Asignamos los empleados.
    $connection->query("INSERT INTO intervienen VALUES (
    $item1,$item,'0');");
    echo "$item1, ";
  }
  echo "asignados a la reparación Nº $item";
}

//Volver a la página principal.
echo "<br><br> <form action='reparaciones.php'><input type='submit' value='Atras' /></form>";
 ?>
 </body>
</html>
