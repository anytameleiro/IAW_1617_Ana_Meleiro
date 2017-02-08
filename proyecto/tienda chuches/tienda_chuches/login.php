<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicia_sesion</title>
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>
  <body>

    <?php
        //FORM SUBMITTED
        if (isset($_POST["user"])) {

          //CREATING THE CONNECTION
          $connection = new mysqli("localhost", "root", "3546", "tienda_chuches");

          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          //MAKING A SELECT QUERY
          //Password coded with md5 at the database. Look for better options
          $username = $_POST['user'];
          $password = $_POST['password'];

          $consulta= "SELECT * FROM cliente WHERE apodo = '$username' AND contrasenia=md5('$password')";


          //Test if the query was correct
          //SQL Injection Possible
          if ($result = $connection->query($consulta)) {

              //No rows returned
              if ($result->num_rows===0) {

                echo "<script>";
                echo "alert ('Usuario o contraseña incorecta')";
                echo "</script>";
              }
              else if ($_POST["user"]==='admin') {
                $_SESSION["admin"]=$_POST["user"];
                header("Location: admin/admin.php");
              }
              else {
                //VALID LOGIN. SETTING SESSION VARS
                $_SESSION["user"]=$_POST["user"];
                $_SESSION["language"]="es";
                header("Location: cliente/principal.php");
              }

          } else {
            echo "Wrong Query";
          }
      }
    ?>
  <form action="login.php" method="post">
    <div class="login1">
      <div id="login2">
          <p>Apodo: </p><p><input name="user" placeholder="nombre" required></p>
          <p>Contraseña: </p><p><input name="password" type="password" placeholder="contraseña" required></p>
          <p><input id="entrar" type="submit" value="Entrar"></p>
          <p class="mensage">¿No estas registrado? <a href="registrar.php">Registrate</a></p>

      </div>
    </div>
  </form>

  </body>
</html>
