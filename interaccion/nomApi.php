<?php
require('abstract.databoundobject.php');
require('mapping.php');
require('pdofactory.php');


// if(){

// }


$count2 = "c";
$source2 = "s";
$version2 = "v";


print "Running...<br />";

        $objPDO = DatabaseHandler::getConnection();
        $objUser = new LogData($objPDO);


        $objUser->setcount($count2)->setsource($source2)->setversion($version2);

        $objUser->Save();
       
        
        print "Saving...<br />";
        

        $id = $objUser->getID();
        
        
        unset($objUser);

     

?>



