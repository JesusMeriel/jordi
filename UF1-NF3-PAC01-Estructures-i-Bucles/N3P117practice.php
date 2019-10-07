<?php

$style = "color: ". $_POST["color"] . ";font-size: ". $_POST["size"] .";font-family: ". $_POST["font"] .";";

if($_POST["check"]){
    setcookie("color", $_POST["color"] ,time()+3600);
    setcookie("size", $_POST["size"] ,time()+3600);
    setcookie("font", $_POST["font"] ,time()+3600);
}

?>
<html>
 <head>
  <title>Please Log In</title>
 </head>
 <body>
 <style>
 .foot{
    margin-top: 20%;
    text-align: center;
 }
 </style>
  <div style="<?php echo $style ?>" >
    <p><?php echo $_POST["txt"] ?></p>
  </div>
  <div class="foot">
    <p>Site developed by: Jesus Meriel</p>
    <a href="mailto:jesusmeriel@gmail.com?Subject=ejercicio%202">Contactar por correo</a>
 </div>
 </body>
</html>
