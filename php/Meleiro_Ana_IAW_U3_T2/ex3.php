<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    
<?php
    $a=array(56,77,199,21,34,123,43); 
    $numax=$a[0];

    for($i=0;$i<sizeof($a);$i++){
        
        //si el primer numero del array es menor al siguiente,dara el numero maximo de los que hay, ya que ira uno por uno comparando cual es mas alto.
        if($numax<$a[$i]){
            $numax=$a[$i];
        }
    }
    echo $numax;  
?>
 
</body>
</html>
