<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
   <?php
        $a = "Harry";
        $c=28;
    
        echo "<p>";
        var_dump($a);
        echo "</p>";
    
        echo "<p>";
        print_r($a);
        echo "</p>";
    
        echo "<p>";
        var_dump($c);
        echo "</p>";
        
        $a=null;
        echo "<p>";
        var_dump($a);
        echo "</p>";
    ?>
</body>
</html>
