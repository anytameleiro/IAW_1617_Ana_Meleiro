<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<title></title>
</head>

<body>
<?php


if (isset($_SESSION["user"])) {


include_once("../../connection.php");

?>
<div id="cuerpo">
<table>
<tr >
<td>
<img src="../fondoimg/logo.png" style="width: 140px;padding-left: 20px;"/>
</td>
<td style="width: 90%;">
<p><a id="salir" href='../../salir.php' >Cerrar sesion</a></p><br>
<?php

echo"<br><a id='perfil' href='perfil.php'>Mi perfil</a>";

?>

<h1>TODO CHUCHES</h1>
</td>
</tr>
</table>
</div>
  <nav class="princ">
  <ul id="first_level">
    <li class="menup"><a href="principal.php" data-title='Inicio'>Inicio</a></li>
<?php
//MAKING A SELECT QUERY

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
