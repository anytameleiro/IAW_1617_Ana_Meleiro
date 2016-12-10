<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
        $a=8;
        echo"<p>Value is now $a</p>";
        $a=round($a+2);
        echo"<p>Add 2. Value is now " .$a."</p>";
        $a=round($a-4);
        echo"<p>Subtract 4. Value is now " .$a."</p>";
       $a=round($a*5);
        echo"<p>Multiply by 5. Value is now " .$a."</p>";
       $a=round($a/3);
        echo"<p>Divide by 3. Value is now " .$a."</p>";
        $a=round($a+1);
        echo"<p>Increment value by one. Value is now " .$a."</p>";
       $a=round($a-1);
        echo"<p>Decrement value by one. Value is now " .$a."</p>";
        
    ?>
</body>
</html>
