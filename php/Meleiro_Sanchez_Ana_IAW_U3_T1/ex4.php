<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
        $i=0;
        $a=abc;
        while ($i<=8) {
          echo "$a "; 
          $i++; 
        }
    
        echo"<p>";
    
        $i=0;
        $b=xyz;
         do {
          echo "$b "; 
          $i++;
        } while ($i<=8);
    
        echo"</p>";
    

        for ($i=0;$i<=8;$i++) {
          echo round($i+1)." "; 
        }
    
        echo"</p>";
    
        echo"</p>";
        
        $i=0;
        echo "<ol>";
        for ($i=65;$i<=70;$i++) {
            $e = chr($i); 
            echo "<li>";
            echo "Item $e";
            echo "</li>";
            
        }
        echo "</ol>"; 
        echo"</p>";
   
       
    ?>
</body>
</html>
