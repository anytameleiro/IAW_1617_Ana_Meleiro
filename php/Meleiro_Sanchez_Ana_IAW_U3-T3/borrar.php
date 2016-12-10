<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
    //Comprobar reparacion.
      if ($result = $connection->query("SELECT * FROM reparaciones where IdReparacion=$item;")) {
          //Borras las facturas.
            if ($result1 = $connection->query("DELETE FROM facturas where IdReparacion=$item;")) {
                //Borrar la reparacion.
                if ($result1 = $connection->query("DELETE FROM reparaciones where IdReparacion=$item;")) {
                    echo "<h1>La reparación Id $item ha sido borrada.</h1><br>";
                } 
                }
            }else{
              mysqli_error($connection);
        }
     //Volver a la página principal.
      echo "<br><form action='reparaciones.php'>
            <input type='submit' value='Atras' />
            </form>";
     ?>

    
</body>
</html>
