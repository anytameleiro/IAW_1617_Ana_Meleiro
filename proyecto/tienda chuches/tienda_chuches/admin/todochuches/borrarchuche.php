<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
    //Open the session
    session_start();

    if (isset($_SESSION["admin"])) {
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
           $obj = $result->fetch_object();
           $image = $obj->img_chu;
             //Borrar.
               if ($result1 = $connection->query("DELETE FROM contiene where id_chuche=$item;")) {
                   //Borrar.
                   if ($result1 = $connection->query("DELETE FROM chuches where id_chuche=$item;")) {
                      unlink("$image");
                       echo "<h1>chuche $item ha sido borrada.</h1><br>";
                   }
               }
           }else{
                 mysqli_error($connection);
               }



     //Volver atras.
      echo "<br><a href='cliente.php'>Atras</a>";
} else {
        session_destroy();
        header("Location: ../../login.php");
    }
     ?>


</body>
</html>
