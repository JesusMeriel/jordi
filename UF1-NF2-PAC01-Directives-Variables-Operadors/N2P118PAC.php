<?php
session_start();
date_default_timezone_set('UTC');
echo date('l jS \of F Y h:i:s A')."<br>";
$_POST["user"];
$_POST["pass"];
$_POST["mail"];

$_SESSION["user"] = $_POST["user"];
$_SESSION["pass"] = $_POST["pass"];
$_SESSION["mail"] = $_POST["mail"];

echo $_COOKIE["cookie"]. "<br>";
if($_GET["g"]){
    echo $_GET["g"] ."<br>";
}else{
    echo "nombre: ". $_SESSION["user"] ."<br>Mail: ". $_SESSION["mail"] ."<br>Password: ". $_SESSION["pass"];
}
?>