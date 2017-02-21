<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
<title></title>
</head>

<body>
<?php
session_start();

if (isset($_SESSION["user"])) {


//CREATING THE CONNECTION
$connection = new mysqli("localhost", "root", "3546", "tienda_chuches");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}
$user=$_POST['user'];
?>
<div id="cuerpo">
<p><a id="salir" href='../../salir.php' >Cerrar sesion</a></p>

<br><a id="perfil" href="perfil.php?apodo=$user">mi perfil</a>
<h1>TODO CHUCHES</h1>
</div>
  <nav class="princ">
  <ul id="first_level">
    <li class="menup"><a href="principal.php" data-title='Principal'>Principal</a></li>
<?php
//MAKING A SELECT QUERY
//Password coded with md5 at the database. Look for better options

$consulta= "SELECT * FROM categoria";
if ($result = $connection->query($consulta)) {


      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW

        echo "<li class='menu'><a href='categoria1.php?idcat=$obj->id_categoria' data-title='$obj->nombre_cat'>".$obj->nombre_cat."</a></li>";

        }


      ?>
    </ul>
    </nav>

  <?php

      $result->close();
      unset($obj);
      unset($connection);


}
} else {
  session_destroy();
  header("Location: ../login.php");
}


?>
</body>
</html>
