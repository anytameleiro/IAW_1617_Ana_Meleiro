<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar categoria</title>
      <link rel="stylesheet" type="text/css" href="../formulario.css">
    </head>
    <body>

      <?php
      //abrir sesion
      session_start();

      if (isset($_SESSION["admin"])) {
        echo "<h1>Modificar</h1>";
      $idcat = $_GET['idcat'];
      $connection = new mysqli('localhost', 'root', '3546', 'tienda_chuches');

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      if ($result = $connection->query("SELECT * from categoria
        where id_categoria = $idcat;")) {

        $obj = $result->fetch_object();

        echo"<div id='h'>";
        echo "<form method='post'>";
          echo"<div id='i'>";
        echo "<span>Id:</span>".$obj->id_categoria ."<br><br>";
        echo "<span>Nombre:</span><input maxlength='10' name='nombre' value='$obj->nombre_cat' required/><br><br>";

        echo"</div>";
                echo "<button name='edit'>Modificar</button>";
                echo"</div>";
        echo"</form>";
        echo "<br><a href='categoria.php'>Atras</a>";


      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);

      if (isset($_POST['edit'])) {

        //variables
        $nombre=$_POST['nombre'];

        //consulta
        $consulta="UPDATE  `tienda_chuches`.`categoria` SET
        `nombre_cat` =  '$nombre'
        WHERE  `categoria`.`id_categoria` =$idcat;";

        if ($result = $connection->query($consulta)){
          header ("Location: categoria.php");
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
