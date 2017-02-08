<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" type="text/css" href="login.css">

  </head>
  <body>


      <?php	if (!isset($_POST["apodo"])) : ?>

        <form method="post" enctype='multipart/form-data'>
          <div class="login1">
            <div id="login2">


                <h2><u>Registrar</u></h2>

                <span>Apodo:</span><input type="text" name="apodo" placeholder="apodo" required><br>
                <span>Nombre:</span><input type="text" name="nombre" placeholder="nombre" required><br>
                <span>Apellidos:</span><input type="text" name="apellidos" placeholder="apellidos" ><br>
                <span>Contraseña:</span><input type="password" name="contrasenia" placeholder="contraseña" required><br>
                <span>Repita la contraseña:</span><input type="password" name="cont2" placeholder="contraseña" required><br>
                <span>Email:</span><input type="email" name="email" placeholder="email" ><br>
                <span>Direccion:</span><input type="text" name="direccion" placeholder="direccion" required><br>
    	          <input id="entrar" type="submit" value="Enviar" name="send">
                <p class="mensage"> <a href="login.php">Atras</a></p>

            </div>
	         </div>
         </form>
      <?php else: ?>

      <?php
        //CREATING THE CONNECTION
        $connection = new mysqli('localhost', 'root', '3546', 'tienda_chuches');
       //TESTING IF THE CONNECTION WAS RIGHT
       if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
      exit();
    }
  ?>

  <?php
  if (isset($_POST['send'])) {
    $nom=$_POST['nombre'];
    $ape=$_POST['apellidos'];
    $cont=$_POST['contrasenia'];
    $cont2=$_POST['cont2'];
    $apodo=$_POST['apodo'];
    $email=$_POST['email'];
    $dir=$_POST['direccion'];
      if ($cont==$cont2){
            $consulta= "INSERT INTO cliente VALUES('$nom','$ape','$dir','$apodo','$email',MD5('$cont'));";
            $result = $connection->query($consulta);
            if (!$result) {
               echo "Query Error";
            } else {
              echo "<script>;
                alert ('Usuario registrado, bienvenid@ $nom');
                var pag='login.php'
                function redireccionar(){
                  location.href=pag;
                }
                setTimeout('redireccionar()',100);
                </script>";

            }


        }else {
          echo "<script>";
          echo "alert ('Las contraseñas no coinciden')";
          echo "</script>";
        }
}

   ?>

<?php endif ?>

  </body>
</html>
