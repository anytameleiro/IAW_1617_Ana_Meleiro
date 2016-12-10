<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
        $mes = date("F"); 
           
        if ($mes==August){
          echo "It's August, so it's really hot.";
        }
        else{
            echo "Not August, so at least not in the peak of the heat.";  
        }
    ?>
</body>
</html>
