<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../formulario.css">
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
          echo "<h1>Añadir</h1>";

		if (!isset($_POST["nom"])) :

      ?>
    <div id='h'>
        <form method="post" enctype='multipart/form-data'>
          <div id='i'>
            <span>Nombre:</span> <input type='text' maxlength='50' name="nom"  placeholder='Nombre' required/><br><br>
            <span>Descripcion:</span> <textarea rows='10' cols='35' maxlength='500'  name="descripcion" placeholder='Descripcion'required></textarea><br><br>
            <span>Imagen:</span><input type='file' name="image" required /><br><br>
            <span>Precio:</span> <input type='text' name="precio" pattern='[0-9]{1,6}[.]{0,1}[0-9]{0,2}' title='Solo numeros y con punto(ej: 1.55)'  placeholder='precio' required><br>

            <?php
            $connection = new mysqli('localhost', 'root', '3546', 'tienda_chuches');

            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

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

            ?>

            </div>

	          <button name="send">Enviar</button><br>
            </div>
            <?php
            echo"<br><a href='chuches.php?idcat=$id'>Atras</a>";
             ?>


         <?php else: ?>

      <?php  echo "Error: " . $result . "<br>" . mysqli_error($connection);


  ?>

  <?php
  if (isset($_POST['send'])) {

    $nom=$_POST['nom'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];
    $tmp_file = $_FILES['image']['tmp_name'];
    $target_dir = "../../imgchu/";
    foreach ($_FILES as $key => $value) {
      foreach ($value as $key2 => $value2) {
        if ($key2 == name ) {
          $nombre = $value2;
        }
      }
    }
    $target_file = strtolower($target_dir . basename($nombre));
    //Can we upload the file

    //var_dump($target_file);
    $valid= true;
    //Check if the file already exists
    if (file_exists("$target_file")) {
      echo "Sorry, file already exists. ";
      $valid = false;
    }
    //Check the size of the file. Up to 2Mb
    if ($_FILES['imagen']['size'] > (2048000)) {
      $valid = false;
      echo 'Oops!  Your file\'s size is to large.';
    }
    //Check the file extension: We need an image not any other different type of file
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
    if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
      $valid = false;
      echo "Only JPG, JPEG, PNG & GIF files are allowed";
    }
    if ($valid) {
      //Put the file in its place
      var_dump("$tmp_file --- $target_file");
      move_uploaded_file($tmp_file, $target_file);
      $consulta= "INSERT INTO `chuches` (`id_chuche`, `id_categoria`, `nombre_chu`, `descripcion`, `img_chu`, `precio`)
      VALUES (NULL, '$categoria', '$nom', '$descripcion', '$target_file', '$precio');";
      $result = $connection->query($consulta);
      // header ("Location: ./index.php");
      if (!$result) {
       echo "Error: " . $result . "<br>" . mysqli_error($connection);

            } else {

     header ("Location: chuches.php");
   }
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
