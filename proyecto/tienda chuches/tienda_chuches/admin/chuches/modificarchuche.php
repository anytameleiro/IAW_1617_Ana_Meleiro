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

        echo "Categoria: <input name='cat' value='$obj->id_categoria'/><br><br>";
        echo "Nombre: <input name='nombre' value='$obj->nombre_chu'/><br><br>";
        echo "Descripcion: <input name='desc' value='$obj->descripcion'/><br><br>";
        echo "Precio: <input name='precio' value='$obj->precio'/><br>";

  //       echo "<label>Product Image: </label>
  // <input class='form-control' type='file' name='image' required />";
  //
  //

        // echo "imagen_1: <input name='imagen' value='$obj->img_chu'/><br><br>";
        // echo "imagen_2: <input name='imagen1' value='$obj->img_chu'/><br><br>";
        // echo "imagen_3: <input name='imagen2' value='$obj->img_chu'/><br><br>";
        // echo "imagen_4: <input name='imagen3' value='$obj->img_chu'/><br><br>";

        echo "<button name='edit'>Modificar</button>";
        echo"</form>";
        echo "<br><form action='chuches.php'>
              <input type='submit' value='Atras' />
              </form>";


      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);

      if (isset($_POST['edit'])) {

        //variables
        $cat=$_POST['cat'];
        $nombre=$_POST['nombre'];
        $desc=$_POST['desc'];
        $precio=$_POST['precio'];



        // $imagen=$_POST['imagen'];

        // $imagen1=$_POST['imagen1'];
        // $imagen2=$_POST['imagen2'];
        // $imagen3=$_POST['imagen3'];

        //consulta
        $consulta="UPDATE  `tienda_chuches`.`chuches` SET
        `id_categoria` =  '$cat',
        `nombre_chu` =  '$nombre',
        `descripcion` =  '$desc',
        `precio` =  '$precio',

        -- `img_chu` =  '$imagen'
        -- `img1_chu` =  '$imagen1',
        -- `img2_chu` =  '$imagen2',
        -- `img3_chu` =  '$imagen3'

        WHERE  `chuches`.`id_chuche` =$id;";

        if ($result = $connection->query($consulta)){
          header ("Location: chuches.php");
        } else {

              echo "<script>";
              echo "alert ('Recuerda: El precio debe ser solo numeros y la categoria debe existir')";
              echo "</script>";
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
