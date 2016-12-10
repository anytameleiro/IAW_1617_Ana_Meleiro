<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<style>
      
      table {
        border:1px solid black; 
        border-collapse:collapse;
       
      }
    
      td {
        width: 50px;
        height: 50px;
       
      }
</style>
<body>
    
    <?php
        $a = [["A" =>1,"B"=>2,"C"=>3],["D"=>4,"E"=>5,"F"=>6],["G"=>7,"H"=>8,"I"=>9]];
    
           echo "<table>";
     //bucle donde pone cada apartado del array en una fila.
       foreach ($a as $v){
            
           echo "<tr>";
            //bucle donde pone cada apartado de cada array en un cuadro de la tabla, y asigna la $b como la letra del array y la $c como el numero del array.
            foreach ($v as $b => $c) {
            echo "<td style='height:50px; width:50px;'>".$b.":".$c."</td> ";
            }
            echo "</tr>";
    
              
        }
        
        echo "</table>";
   
    ?>
</body>
</html>
