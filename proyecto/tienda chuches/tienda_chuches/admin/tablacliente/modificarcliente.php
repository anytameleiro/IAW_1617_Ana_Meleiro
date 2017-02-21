<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar chuche</title>
    <link rel="stylesheet" type="text/css" href=" ">
    </head>
    <body>

      <?php
      //abrir sesion
      session_start();

      if (isset($_SESSION["admin"])) {
      $apo = $_GET['apo'];
      $connection = new mysqli('localhost', 'root', '3546', 'tienda_chuches');

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      if ($result = $connection->query("SELECT * from cliente
        where apodo ='$apo';")) {

        $obj = $result->fetch_object();

        echo "<form method='post'>";

        echo "Nombre: <input maxlength='50' name='nom' value='$obj->nombre' required/><br><br>";
        echo "Apellidos: <input maxlength='50' name='ape' value='$obj->apellidos' required/><br><br>";
        echo "Direccion: <input maxlength='50' name='direc' value='$obj->direccion' required/><br><br>";
        echo "Apodo:<input maxlength='25' name='apodo' value='$obj->apodo' required/><br><br>";
        echo "Email: <input maxlength='50' name='email' value='$obj->email' required/><br><br>";

        echo "<button name='edit'>Modificar</button>";
        echo"</form>";
        echo "<br><a href='cliente.php'>Atras</a>";

      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }


      if (isset($_POST['edit'])) {

        //variables

        $nombre=$_POST['nom'];
        $apellido=$_POST['ape'];
        $direccion=$_POST['direc'];
        $apodo=$_POST['apodo'];
        $email=$_POST['email'];

        //consulta
        $consulta="UPDATE  `tienda_chuches`.`cliente` SET


        `nombre` = '$nombre',
        `apellidos` = '$apellido',
        `direccion` = '$direccion',
        `apodo` = '$apodo',
        `email` = '$email'
        WHERE  `cliente`.`apodo` = '$apo';";

        // echo $consulta;
        if ($result = $connection->query($consulta)){
          header ("Location: cliente.php");
        } else {
              echo "Error: " . $result . "<br>" . mysqli_error($connection);
          }
      }
      unset($connection);


    } else {
      session_destroy();
      header("Location: ../../login.php");
    }
    ?>
    </body>
</html>
