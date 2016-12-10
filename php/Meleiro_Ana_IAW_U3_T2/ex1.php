<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
    echo"<ul>";
    $a=array("A","B","C","D");
    
    //un bucle, con la distancia del array -1 para que vaya para atras
    for ($i=sizeof($a)-1;$i>=0;$i--) {
         
         echo "<li>".$a[$i]."</li>";
     }
     echo"</ul>";
    ?>
   
</body>
</html>
