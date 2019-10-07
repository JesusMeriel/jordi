<?php
session_start();
if(!isset($_SESSION["cont"])){
    $_SESSION["cont"] = 1;
}else{
    $_SESSION["cont"] = $_SESSION["cont"] + 1;
}
echo "Visitas: ". $_SESSION["cont"] ."<br>";
date_default_timezone_set('UTC');
$date = date( "Y-m-d" );
$ayer = date( "d", strtotime( "-1 day", strtotime( $date ) ) );
$mes_anterior = date( "m", strtotime( "-1 month", strtotime( $date ) ) );
$month = date("m");
$day = date("d");
$resto_year = 12 - $month;
echo "Yesterday it was ". $ayer. ".<br>" ;
echo "The previus month is ". $mes_anterior. ".<br>" ;

if ($month ==  1) { $resto_mes= 31 - $day; }
if ($month ==  2) { $resto_mes= 28 - $day; }
if ($month ==  3) { $resto_mes= 31 - $day; }
if ($month ==  4) { $resto_mes= 30 - $day; }
if ($month ==  5) { $resto_mes= 31 - $day; }
if ($month ==  6) { $resto_mes= 30 - $day; }
if ($month ==  7) { $resto_mes= 31 - $day; }
if ($month ==  8) { $resto_mes= 31 - $day; }
if ($month ==  9) { $resto_mes= 30 - $day;}
if ($month == 10) { $resto_mes= 31 - $day; }
if ($month == 11) { $resto_mes= 30 - $day; }
if ($month == 12) { $resto_mes= 31 - $day;}

echo "There are " .$resto_mes. " days left in this month.<br>";
echo "There are " .$resto_year. " months left in the current year.<br>";

if (($month >= 1) && ($month <= 3)) { echo "Good winter"; }
if (($month >= 4) && ($month <= 6)) { echo "Good spring"; }
if (($month >= 7) && ($month <= 9)) { echo "Good summer"; }
if (($month >= 10) && ($month <= 12)) { echo "Good autumn"; }
?>
<html>
 <head>
  <title>Please Log In</title>
 </head>
 <body>
 <div>
   <form method="post" action="N3P117practice.php">
       <p>Enter your text:<br> 
        <textArea type="text" name="txt"/></textArea>
       </p>
       <p>Choose the color: 
        <input type="color" name="color"/>
       </p>
       <p>choose the size: 
        <select name="size">
          <option value="10">10</option> 
          <option value="20" selected>20</option>
          <option value="30">30</option>
        </select>
       </p>
       <p>choose the font: 
        <select name="font">
          <option value="Comic Sans MS">Comic Sans</option> 
          <option value="Georgia" selected>Georgia</option>
          <option value="Impact">Impact</option>
        </select>
       </p>
       <p>Do you want save the cookies?<br> 
        Yes:<input type="checkbox" name="check"/><br>
       </p>
       <p>
        <input type="submit" name="submit" value="Submit"/>
       </p>
   </form>    
 </div>
 <?php
 $style = "color: ". $_COOKIE["color"] . ";font-size: ". $_COOKIE["size"] .";font-family: ". $_COOKIE["font"] .";";
 if($_COOKIE["color"]){
 ?>    
   <div style="<?php echo $style ?>">
    <p>show the cookies</p>
   </div>  
 <?php    
 }
 include 'N3P117practice.php';
 ?>
 
 </body>
</html>