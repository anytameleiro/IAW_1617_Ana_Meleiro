<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar chuche</title>
    <link rel="stylesheet" type="text/css" href="../formulario.css">
    </head>
    <body>

      <?php
      //abrir sesion
      session_start();

      if (isset($_SESSION["admin"])) {
        echo "<h1>Modificar</h1>";
      $id = $_GET['id'];
      $connection = new mysqli('localhost', 'root', '3546', 'tienda_chuches');

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      if ($result = $connection->query("SELECT * from chuches
        where id_chuche = '$id';")) {

        $obj = $result->fetch_object();
        echo"<div id='h'>";
        echo "<form method='post'>";
          echo"<div id='i'>";
        echo "<span>Id:</span>".$obj->id_chuche ."<br><br>";

        echo "<span>Nombre:</span><input maxlength='50' name='nombre' value='$obj->nombre_chu' required/><br><br>";

        echo "<span id='d'>Descripcion:</span><textarea rows='10' cols='35' maxlength='500' name='desc'>".$obj->descripcion."</textarea><br><br>";

        echo "<span>Precio:</span><input name='precio' value='$obj->precio' pattern='[0-9]{1,6}[.]{0,1}[0-9]{0,2}' title='Solo numeros y con punto(ej: 1.55)' required /><br><br>";

        $result2 = $connection->query("SELECT * FROM categoria");

        echo "<span>Categoria:</span><select name='cat' required><br><br>";
        while ($obj2=$result2->fetch_object()) {
                  echo "<option>";
                  echo $obj2->nombre_cat;
                  echo "</option>";
        }
               echo"</select>";
               $cat=$_POST['cat'];
               $result3 = $connection->query("SELECT id_categoria FROM `tienda_chuches`.`categoria` WHERE `nombre_cat` = '$cat';");
               $obj3=$result3->fetch_object();
               $categoria= $obj3->id_categoria;

  //       echo "<label>Product Image: </label>
  // <input class='form-control' type='file' name='image' required />";

echo"</div>";
        echo "<button name='edit'>Modificar</button>";
        echo"</div>";
        echo"</form>";
        echo "<br><a href='chuches.php'>Atras</a>";

      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }


      if (isset($_POST['edit'])) {

        //variables
        $nombre=$_POST['nombre'];
        $desc=$_POST['desc'];
        $precio=$_POST['precio'];


        // $categoria=$obj2->id_categoria;

        // $imagen=$_POST['imagen'];

        //consulta
        $consulta="UPDATE  `tienda_chuches`.`chuches` SET

        `nombre_chu` =  '$nombre',
        `descripcion` =  '$desc',
        `precio` =  '$precio',
        `id_categoria`='$categoria'
        -- ,
        -- `id_categoria`=$categoria

        -- `img_chu` =  '$imagen'
        WHERE  `chuches`.`id_chuche` = '$id';";



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
