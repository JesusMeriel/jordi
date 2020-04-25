<?php
require('abstract.databoundobject.php');
require('mapping.php');
require('pdofactory.php');

 $strDSN = "pgsql:dbname=nasa;host=localhost;port=5432;user=postgres;password=";
        $objPDO = PDOFactory::GetPDO($strDSN, "nasa", "", array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $objUser = new LogData($objPDO,1);



$showcount = $objUser->getcount();
$showsource = $objUser->getsource();
$showversion = $objUser->getversion();


        $id = $objUser->getID();
        
        
        unset($objUser);

echo ("Informacion: " . $showcount . "<br>Mensaje: ". $showsource . "<br>Codigo: " . $showversion);


?>