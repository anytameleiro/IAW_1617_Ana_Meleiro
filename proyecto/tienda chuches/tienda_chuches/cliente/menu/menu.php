<?php
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
  <h1>TODO CHUCHES</h1>
  <div id="container">
    <ul id="first_level">
      <li>Principal</li>
      <?php
      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW
        echo "<li>".$obj->nombre_cat."</li>";

        }


      ?>
    </ul>
  </div>
  <?php

      $result->close();
      unset($obj);
      unset($connection);


}
?>
