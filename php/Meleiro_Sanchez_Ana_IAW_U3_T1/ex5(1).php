<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Basics 16-17.Ex05</title>
    <style>
      .par {
        background-color: grey;
      }
      .impar {
        background-color: red;
      }
      td {
        width: 50px;
        height: 50px;
      }
    </style>
    </head>
  <body>
      <?php
        //Opening the table
        echo "<table>";
        //Main Loop. One Iteration per row
        for ($i=0;$i<10;$i++) {
          //Opening the row
          if (($i%2)==0) {
            //Even Row
            echo "<tr class='par'></td>";
          } else {
            //Odd Row
            echo "<tr class='impar'></td>";
          }
          //Inner Loop. One iteration per column
          for ($j=0; $j<10;$j++) {
            echo "<td></td>";
          }
          //Closing the row
          echo "</tr>";
        }
        //Closing the table
        echo "</table>";
      ?>
  </body>
</html>
