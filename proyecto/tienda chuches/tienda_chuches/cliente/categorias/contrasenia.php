<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../menu.css">

  <title>TODO CHUCHES</title>

</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {
      include_once("../menu.php");
      $apo = $_GET['apo'];

    echo "<h1>Cambiar contraseña</h1>";

    //CREATING THE CONNECTION
    $connection = new mysqli("localhost", "root", "3546", "tienda_chuches");

    //TESTING IF THE CONNECTION WAS RIGHT
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }

    echo"<div id='h'>";
    echo "<form method='post'>";
      echo"<div id='i'>";
  echo"
  <span>Contraseña actual: </span><input type='password' name='actual' placeholder='contraseña' maxlength='64' required/><br><br>";

  echo"<span>Contraseña nueva: </span><input type='password' name='contnuevo1' placeholder='contraseña' maxlength='64' required/><br><br>
  <span>Repita la contraseña nueva: </span><input type='password' name='contnuevo2' placeholder='contraseña' maxlength='64' required/><br><br>";
echo"</div>";
  echo "<button name='edit'>Modificar</button>";


    echo"</div>";
  echo"</form>";
  echo "<br><a href='perfil.php'>Atras</a>";

    //MAKING A SELECT QUERY

    $consulta="SELECT contrasenia from cliente where apodo='$apo'";
    $result = $connection->query($consulta);
    $obj = $result->fetch_object();

    if (isset($_POST['edit'])) {


      $cont2=md5($_POST['actual']);
      $contnu=md5($_POST['contnuevo1']);
      $contnu2=md5($_POST['contnuevo2']);



    if ($obj->contrasenia==$cont2){

      if ($contnu==$contnu2){
        $consulta="UPDATE  `tienda_chuches`.`cliente` SET `contrasenia` = '$contnu2'
        WHERE  `cliente`.`apodo` = '$apo';";

        if ($result = $connection->query($consulta)){

          echo "<script>
          alert ('Contraseña cambiada')
          var pag='perfil.php'
          function redireccionar1(){
            location.href=pag;
          }
          setTimeout('redireccionar1()',5);
          </script>";
        } else {
              echo "Error: " . $result . "<br>" . mysqli_error($connection);
          }

        }else {
          echo "<script>
          alert ('Contraseña nueva no coincide')
          var pag='contasenia.php'
          function redireccionar1(){
            location.href=pag;
          }
          setTimeout('redireccionar1()',5);
          </script>";

        }

      }else {
          echo "<script>
          alert ('Contraseña actual incorrecta')
          var pag='contrasenia.php'
          function redireccionar1(){
            location.href=pag;
          }
          setTimeout('redireccionar1()',5);
          </script>";

      }

}
unset($connection);




  } else {
    session_destroy();
    header("Location: ../login.php");
  }


 ?>
</body>
</html>
