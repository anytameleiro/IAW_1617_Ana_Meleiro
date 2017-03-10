<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../menu.css">
<link rel="stylesheet" type="text/css" href="categoria.css">
<script src="jquery-1.11.3.js"></script>
      <link rel="stylesheet" type="text/css" href="principal.css">
    <link rel="shortcut icon" href="../../img/logo.ico">
  <title>TODO CHUCHES</title>
  <style>
  table{
    margin:auto;
  }

  </style>
</head>

<body>
<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {
    //SESSION ALREADY CREATED

    include_once("../menu.php");
    echo" <div class='login1'>
      <div id='login2'>";
    ?>
    <table style="text-align:center;">
       <!-- <tr>
           <td>
             <iframe src="http://elpais.com/tag/caramelos/a" width="600" height="600"></iframe>
           </td>
           <td>
             <h3>Juego</h3>
             <embed src="http://www.games68.com/games/game-1304018791.swf" width="640" height="480" quality="high"
               pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" menu="false" >
             </embed>

           </td>

     </tr> -->
     <tr>
       <td><div id="blanco">

      <div id="segundo">

      <ul id="imagenes">


			<li><img id="imagen1" src="imagenes/3.png" /></li>


	  </ul>
    <button id="izq"> << </button>
    <button id="derech"> >> </button>


        </div>
    </div>
      <script type="text/javascript">
        //This part is executed only when all the document is loaded
        $(function() {
            console.log("Ready for jQuery");
            vf=["imagenes/3.png","imagenes/2.png","imagenes/1.png","imagenes/4.jpg","imagenes/6.jpg","imagenes/7.png","imagenes/8.png"];
            vc=0;


               //
              //     for (var i=0; i<8; i++) {
              //         setTimeout(function(){
              //       // va=vc+i;
              //     // if (i==7){i=0};
              //    $("#imagen1").attr("src",vf[i]);
              //     }, 1000);
              //  }




            $("#derech").click(function(){
                vc=vc+1
                if (vc==7){vc=0};
               $("#imagen1").attr("src",vf[vc]);

            });
            $("#izq").click(function(){
                vc=vc-1
                if (vc<0){vc=6};
                $("#imagen1").attr("src",vf[vc])

            });
        });
      </script>
    </td>
     </tr>

</table>
    <?php
    echo" </div>";
      echo" </div>";
?>
    <div id="pricePlans">
    </div>

<?php
include_once("../info.php");
  } else {
    session_destroy();
    header("Location: ../../login.php");
  }


 ?>
</body>
</html>
