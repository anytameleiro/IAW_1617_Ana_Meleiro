<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="menu.css">
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

//MAKING A SELECT QUERY
//Password coded with md5 at the database. Look for better options

$consulta= "SELECT * FROM categoria";
if ($result = $connection->query($consulta)) {
  ?>
  <p><a href=''>cerrar sesion</a></p>
  <a href=''>mi perfil</a>
  <h1>TODO CHUCHES</h1>
  <div id="container">
    <ul id="first_level">
      <li><a href="principal.php">Principal</a></li>
      <?php
      $link=array("car_goma.php","caramelo.php");
      $i=0;
      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW
          $a=$i++;
        echo "<li><a href='$link[$a]'>".$obj->nombre_cat."</a></li>";

        }


      ?>
    </ul>
  </div>
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
