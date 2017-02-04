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
    $connection = new mysqli("localhost", "root", "3546", "tienda_chuches");
    //Prueba conexion correcta.
    if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
    }
    //Transformar $_GET en id_chuche.
    foreach ($_GET as $key => $item)
    //Comprobar.
      if ($result = $connection->query("SELECT * FROM chuches where id_chuche=$item;")) {

          //Borrar.
            // if ($result1 = $connection->query("DELETE FROM contiene where id_chuche=$item;")) {
                //Borrar.
                // echo"borrado";
                if ($result1 = $connection->query("DELETE FROM chuches where id_chuche=$item;")) {
                    echo "<h1>chuche $item ha sido borrada.</h1><br>";
                }
            // }
        }else{
              mysqli_error($connection);
            }
     //Volver a la página principal.
      echo "<br><form action='admin.php'>
            <input type='submit' value='Atras' />
            </form>";
     ?>


</body>
</html>
