<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar chuche</title>
    <link rel="stylesheet" type="text/css" href="../menu.css">

    <title>TODO CHUCHES</title>
    <body>

      <?php
      //abrir sesion
      session_start();

      if (isset($_SESSION["user"])) {
          include_once("../menu.php");
        echo "<h1>Modificar perfil</h1>";
      $apo = $_GET['apo'];
      $connection = new mysqli('localhost', 'root', '3546', 'tienda_chuches');

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

        if ($result = $connection->query("SELECT * from cliente where apodo ='$apo';")) {

        $obj = $result->fetch_object();

        echo"<div id='h'>";
        echo "<form method='post'>";
          echo"<div id='i'>";
        echo "<span>Nombre:</span><input maxlength='50' name='nom' value='$obj->nombre' required/><br><br>";
        echo "<span>Apellidos:</span><input maxlength='50' name='ape' value='$obj->apellidos'/><br><br>";
        echo "<span>Direccion:</span><input maxlength='50' name='direc' value='$obj->direccion' required/><br><br>";
        echo "<span>Apodo:</span><input maxlength='25' name='apodo' value='$obj->apodo' required/><br><br>";
        echo "<span>Email:</span><input maxlength='50' name='email' value='$obj->email'/><br><br>";

        echo"</div>";
        echo "<button name='edit'>Modificar</button>";
        echo"</div>";
        echo"</form>";
        echo "<br><a href='perfil.php'>Atras</a>";


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
          header ("Location: perfil.php");
        } else {
              echo "Error: " . $result . "<br>" . mysqli_error($connection);
          }
      }

      if (isset($_POST['modi'])) {


        //variables

        $nombre=$_POST['nom'];
        $apellido=$_POST['ape'];
        $direccion=$_POST['direc'];
        $email=$_POST['email'];

        //consulta
        $consulta="UPDATE  `tienda_chuches`.`cliente` SET


        `nombre` = '$nombre',
        `apellidos` = '$apellido',
        `direccion` = '$direccion',
        `email` = '$email'
        WHERE  `cliente`.`apodo` = '$apo';";


        if ($result = $connection->query($consulta)){
          header ("Location: perfil.php");
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
