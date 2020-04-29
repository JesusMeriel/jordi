<?php
require('abstract.databoundobject.php');
require('mapping.php');
require('pdofactory.php');

 $strDSN = "pgsql:dbname=twitter;host=localhost;port=5432;user=postgres;password=";
        $objPDO = PDOFactory::GetPDO($strDSN, "twitter", "", 
            array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $objUser = new LogData($objPDO,1);


$Date2 = $objUser->getdate();
$Url2= $objUser->geturl();
$Img2 = $objUser->getimage();
$Twit2 = $objUser->gettwit();

        $id = $objUser->getID();
        
        
        unset($objUser);


echo ("Los valores son los siguientes:" . "<br>");

echo ("La fecha de publicacion: " . $Date2 . "<br>");
echo ("La url: " . $Url2 . "<br>");
echo ("El nombre: " . $Img2 . "<br>");
echo ("El tweet: " . $Twit2 . "<br>");


?>