<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
     $a=[2,4,6,8];
     $b=[7,8,9,10];
     

    for($i=0;$i<sizeof($a);$i++){
        //almaceno todos los numeros de $a en $c
        $c[]=$a[$i];
    
    }
    for($i=0;$i<sizeof($b);$i++){
        //almaceno todos los numeros de $b en $c
        $c[]=$b[$i];
      
    }
    var_dump($c);//muestro $c
    
    ?>
</body>
</html>
