<?php
require('abstract.databoundobject.php');
require('mapping.php');
require('pdofactory.php');

$html = file_get_contents("https://ssd-api.jpl.nasa.gov/scout.api");

$json = json_decode($html);


$count2 = $json->count;
$source2 = $json->signature->source;
$version2 = $json->signature->version;



echo ($count2 . $source2 . $version2);





print "Running...<br />";

        $strDSN = "pgsql:dbname=nasa;host=localhost;port=5432;user=postgres;password=";
        $objPDO = PDOFactory::GetPDO($strDSN, "nasa", "", array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $objUser = new LogData($objPDO);


        $objUser->setcount($count2)->setsource($source2)->setversion($version2);

        $objUser->Save();
       
        
        print "Saving...<br />";
        

        $id = $objUser->getID();
        
        
        unset($objUser);

     

?>



