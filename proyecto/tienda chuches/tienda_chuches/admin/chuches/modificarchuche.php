<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href=" ">
    </head>
    <body>

      <?php
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

        echo "Categoria: <input name='gender' value='$obj->id_categoria'\><br><br>";
        echo "Nombre: <input name='name' value='$obj->nombre_chu'\><br><br>";
        echo "Descripcion: <input name='duration' value='$obj->descripcion'\><br><br>";
        echo "Precio: <input name='trailer' value='$obj->precio'\><br><br>";

        // echo "imagen1: <input name='image' value='$obj->img_chu'\><br><br>";
        echo "<button name='edit'>Modificar</button>";
        echo "</from>";
      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);

      if (isset($_POST['edit'])) {

        //variables
        $gender=$_POST['gender'];
        $name=$_POST['name'];
        $duration=$_POST['duration'];
        $trailer=$_POST['trailer'];
        // $image=$_POST['image'];

        //consulta
        $consulta="UPDATE  `tienda_chuches`.`chuches` SET
        `id_categoria` =  '$gender',
        `nombre_chu` =  '$name',
        `descripcion` =  '$duration',
        `precio` =  '$trailer'

        -- `img_chu` =  '$image'
        WHERE  `chuches`.`id_chuche` =$id;";

        var_dump($consulta);
        if ($result = $connection->query($consulta))

           {
          header ("Location: chuches.php");
        } else {

              echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }
      }
      unset($connection);
      ?>

      <!-- <script type="text/javascript" src=" "></script> -->
    </body>
</html>
