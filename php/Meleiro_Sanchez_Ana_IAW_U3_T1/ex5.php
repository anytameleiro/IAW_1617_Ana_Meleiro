<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
   
    <?php
        echo"<table >";
            for($i=0;$i<=9;$i++){
               echo"<tr>";
                if($i%2 == 1){  
                    for($a=0;$a<=9;$a++){
                    echo"<td style='background-color:gray;height:50px; width:50px;' border='1'></td>";
                    }
                    
               }else{
                 for($a=0;$a<=9;$a++){
                    echo"<td style='background-color:red;height:50px; width:50px;' border='1'></td>";
                    }
                }
                echo"</tr>";
          }
       echo "</table>"; 
    
    ?>
</body>
</html>
