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
      $id = $_GET['id'];
      $connection = new mysqli('localhost', 'root', '3546', 'tienda_chuches');

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      if ($result = $connection->query("SELECT * from chuches
        where id_chuche = $id;")) {

        $obj = $result->fetch_object();

        echo "<form method='post'>";
        echo "Id:".$obj->id_chuche ."<br><br>";
        echo "Categoria:".$obj->id_categoria."<br><br>";
        echo "Nombre: <input maxlength='50' name='nombre' value='$obj->nombre_chu' required/><br><br>";
        echo "Descripcion: <input id='textolargo' maxlength='500' name='desc' value='$obj->descripcion'/><br><br>";


        echo "Precio: <input name='precio' value='$obj->precio' pattern='[0-9]{1,6}[.]{0,1}[0-9]{0,2}' title='Solo numeros y con punto(ej: 1.55)' required /><br>";

  //       echo "<label>Product Image: </label>
  // <input class='form-control' type='file' name='image' required />";


        echo "<button name='edit'>Modificar</button>";
        echo"</form>";
        echo "<br><a href='chuches.php'>Atras</a>";

      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);

      if (isset($_POST['edit'])) {

        //variables
        $nombre=$_POST['nombre'];
        $desc=$_POST['desc'];
        $precio=$_POST['precio'];



        // $imagen=$_POST['imagen'];

        //consulta
        $consulta="UPDATE  `tienda_chuches`.`chuches` SET

        `nombre_chu` =  '$nombre',
        `descripcion` =  '$desc',
        `precio` =  '$precio'

        -- `img_chu` =  '$imagen'
        WHERE  `chuches`.`id_chuche` =$id;";

        if ($result = $connection->query($consulta)){
          header ("Location: chuches.php");
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
