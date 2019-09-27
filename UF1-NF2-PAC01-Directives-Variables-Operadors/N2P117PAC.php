<html>
 <head>
  <title>Please Log In</title>
 </head>
 <body>
  <form method="post" action="N2P118PAC.php">
   <p>Enter your username: 
    <input type="text" name="user"/>
   </p>
   <p>Enter your password: 
    <input type="password" name="pass"/>
   </p>
   <p>Enter your mail: 
    <input type="text" name="mail"/>
   </p>
   <p>
    <input type="submit" name="submit" value="Submit"/>
   </p>
  </form>
 </body>
</html><?php
//$cookie = "cookie creada";
//setcookie("cookie", $cookie ,time()+3600);
$valor_cookie = "cookie creada";
setcookie("cookie", $valor_cookie ,time()+3600);
$g = urlencode("prueba get");
echo "<p><a href='N2P118PAC.php?g=$g'>Clica aqui para pasar por get</p>";
?>

