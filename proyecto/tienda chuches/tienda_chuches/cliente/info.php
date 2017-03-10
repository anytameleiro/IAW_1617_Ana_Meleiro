<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {


    echo"<div id='negro'>";
echo"<h3>Informacion</h3>";
    include_once("../connection.php");

    //MAKING A SELECT QUERY

    $consulta="SELECT * from cliente where apodo='admin';";

    if ($result = $connection->query($consulta)) {
    }else {

          echo "Error: ". $sql ."<br>". mysqli_error($connection);
    }
    $obj = $result->fetch_object();

    echo "<span>".$obj->email."</span>";
    echo "<span>".$obj->telefono."</span>";
    echo "<span>".$obj->direccion."</span>";

    echo"</div>";



  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
