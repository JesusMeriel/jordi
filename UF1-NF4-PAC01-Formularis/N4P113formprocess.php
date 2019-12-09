<?php

$n1 = $_POST["nombre1"];
$n2 = $_POST["nombre2"];
$n3 = $_POST["nombre3"];
$n4 = $_POST["nombre4"];
$n5 = $_POST["nombre5"];


echo "<select name='nombres'>";
echo "<option value='". $n1 ."'>". $n1 ."</option>";
echo "<option value='". $n2 ."'>". $n2 ."</option>";
echo "<option value='". $n3 ."'>". $n3 ."</option>";
echo "<option value='". $n4 ."'>". $n4 ."</option>";
echo "<option value='". $n5 ."'>". $n5 ."</option>";
echo "</select>";
