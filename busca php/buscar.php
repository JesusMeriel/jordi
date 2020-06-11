<?php
    require('libreria.php');
    require('abstract.databoundobject.php');
    require('mapping.php');
    require('pdofactory.php');
    $servidor = "localhost";
    $usuari = "root";
    $contrasenya = "";
    $bd = "buscador";
    
    // *******************   LISTADO DE TODOS LOS DISCOS *********//
 
    $connexio = connectar_BD ($servidor, $usuari, $contrasenya, $bd);
    
    $consultaBusqueda = $_POST['textoBusqueda'];
    echo "Resultados para: ". $consultaBusqueda ."<br>";
    $dades = consulta_SQL ($connexio, "select * from bsc where palabra like '$consultaBusqueda%' ORDER BY total DESC LIMIT 5");
    if ($dades != null){	
        if(consulta_fila($dades) == ""){
            echo"Añadido";
            // $dades = consulta_SQL ($connexio, "insert into bsc (palabra, total, lastvisit) VALUES ('$consultaBusqueda', 0, '2030-01-01 12:12:12')");

            $strDSN = "mysql:dbname=buscador;host=localhost";
            $objPDO = PDOFactory::GetPDO($strDSN, "root", "", []);
            $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $objUser = new LogData($objPDO);

             $objUser->setpalabra($consultaBusqueda)->settotal(0)->setlastvisit('2030-01-01 12:12:12');

            // echo $objUser;

            $objUser->Save();
           // echo $objUser;
            
            print "Saving...<br />";
            

            echo $objUser->getID();        
            
            unset($objUser);

        }else{
            

            $dades = consulta_SQL ($connexio, "select * from bsc where palabra like '$consultaBusqueda%' ORDER BY total DESC LIMIT 5");
            $id = 0;
            echo "<select name='cosa' id='cosa' size='5'>";
            while ($disc = consulta_fila($dades))
            {   
                $nom = consulta_dada($disc, 'palabra');
                if($id == 0){
                    $palabra = $nom;
                }
                echo "<option class='items' value=". $id ."><a href='datos_grupo.php'>". $nom ."</a></option>";
                //echo "<p>". $nom ."</p>";
                $id ++;
            }
            echo "</select>";

            $dades = consulta_SQL ($connexio, "select total from bsc where palabra = '$consultaBusqueda' ");
            if($disc = consulta_fila($dades))
            {   
                $total = consulta_dada($disc, 'total');
                $total = $total + 1;
                
            }
            if(isset($total)){
                $dades = consulta_SQL ($connexio, "update bsc set total = '$total' where palabra = '$consultaBusqueda'");
            }            
        }
    	
    }else{
        
    }
    //tancar_consulta ($dades);
    desconnectar_BD ($connexio);
    
  
?>