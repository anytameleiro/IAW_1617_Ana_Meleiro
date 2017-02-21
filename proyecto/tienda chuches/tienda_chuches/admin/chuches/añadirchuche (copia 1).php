<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir chuche</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
      span {
        width: 100px;
        display: inline-block;
        margin-bottom: 11px;
      }
    </style>
  </head>
  <body>


      <?php
      //abrir sesion
      session_start();

      if (isset($_SESSION["admin"])) {
      ?>
      <?php
      if (!isset($_POST["idcat"])) : ?>
        <form action="añadirchuche.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>CHUCHE</legend>

            ID: <input type="text" name="id" pattern="[0-9]{1,10}" title="Solo numeros y hasta 10 caracteres" required/><br>


            Categoria: <input name='cat' type="text" pattern="[1-8]{1,1}" title="Solo numeros del 1 al 10" required/><br><br>


            Nombre: <input type="text" maxlength="50" name="nam" required/><br>
            Descripcion: <input id="textolargo" type="text" maxlength="500" name="desc" required />
            Imagen:<input type="file" name="img1" required /><br>
            Precio: <input type="text" name="precio" pattern="[0-9]{1,6}[.]{0,1}[0-9]{0,2}" title="Solo numeros y con punto(ej: 1.55)" required><br>

	    <input type="submit" value="Enviar"><br>
      <!-- $categoria = $_GET['idcat'];
      echo" <a href='chuches.php?idcat=$categoria'>Atras</a>"; -->

    </fieldset>
  </form>



      <?php else: ?>

          <?php
            // var_dump($_FILES);
          // archivo subido se almacena temporalmente
          $tmp_file = $_FILES['img1']['tmp_name'];
          //directorio donde se guarda la imagen
          $target_dir = "../../imgchu/";
          //nombre de imagen.
          $target_file = strtolower($target_dir . basename($_FILES['img1']['name']));
          //Can we upload the file
           $valid= true;
          //si existe el nombre de la imagen
          if (file_exists("$target_file")) {
            $valid = false;
              echo "La imagen ya existe, cambia el nombre";

          }
          //Si pesa mas de 2Mb
          if ($_FILES['img1']['size'] > (2048000)) {
              $valid = false;
              echo 'La imagen pesa mucho';
          }
          //Que el archivo sea una imagen
          $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); //esta la extension
          if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png") {
              $valid = false;
              echo "Solo imagenes JPG, JPEG y PNG";
          }


          if ($valid) {

              move_uploaded_file($tmp_file, $target_file);

              //CREATING THE CONNECTION
              $connection = new mysqli("localhost", "root", "3546", "tienda_chuches");
              $connection->set_charset("uft8");
              //TESTING IF THE CONNECTION WAS RIGHT
              if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();
              }
              $consulta= "INSERT INTO chuches VALUES('".$_POST['id']."','".$_POST['cat']."', '".$_POST['nam']."','".$_POST['desc']."','$target_file','".$_POST['precio']."')";


          	   $result = $connection->query($consulta);
          	   if (!$result) {
                echo "Error: " . $result . "<br>" . mysqli_error($connection);
                     } else {

          		header ("Location: chuches.php");
      	   }
        }

        ?>

      <?php endif ?>
  <?php
    } else {
      session_destroy();
      header("Location: ../../login.php");
    }
    ?>

  </body>
</html>
