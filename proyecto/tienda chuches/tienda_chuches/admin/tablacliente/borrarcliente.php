<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar chuche</title>
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
         if ($result = $connection->query("SELECT * FROM cliente where apodo='$item';")) {


           if($item =='admin'){
             echo"<h1>No se puede borrar el administrador</h1>";

           }else
           if ($result1 = $connection->query("DELETE FROM pedido where apodo='$item';")) {    //Borrar.

                   //Borrar.
                   if ($result2 = $connection->query("DELETE FROM cliente where apodo='$item';")) {

                       echo "<h1>El cliente $item ha sido borrada.</h1><br>";
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
