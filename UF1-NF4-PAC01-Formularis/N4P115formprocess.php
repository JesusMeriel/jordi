<?php

$n1 = $_POST["num1"];
$n2 = $_POST["num2"];
$n3 = $_POST["num3"];
$result = 0;

$result = $n1 + $n2 + $n3;

echo "la suma de ". $n1 .", ". $n2 ." y ". $n3 ." es: ". $result;

