<?php
    require('libreria.php');
    
    $servidor = "localhost";
    $usuari = "root";
    $contrasenya = "";
    $bd = "buscador";
    
    // *******************   LISTADO DE TODOS LOS DISCOS *********//
 
    $connexio = connectar_BD ($servidor, $usuari, $contrasenya, $bd);
    
    $muestra = $_POST['muestra'];
    $dades = consulta_SQL ($connexio, "select * from bsc where palabra like '$muestra%'");
    if ($dades != null){	
        if(consulta_fila($dades) == ""){
            echo"vacio";
        }else{
            

            $dades = consulta_SQL ($connexio, "select * from bsc where palabra like '$muestra%'");
            echo "<table><tr><th>ID</th><th>Palabra</th><th>Total</th><th>Last Visit</th></tr>";
            while ($disc = consulta_fila($dades)){   
                $id = consulta_dada($disc, 'id');
                $palabra = consulta_dada($disc, 'palabra');
                $total = consulta_dada($disc, 'total');
                $lastvisit = consulta_dada($disc, 'lastvisit');
                echo "<tr><td>$id</td><td>$palabra</td><td>$total</td><td>$lastvisit</td></tr>";
            }  
            echo "</table>";       
        }
    	
    }else{
        
    }
    //tancar_consulta ($dades);
    desconnectar_BD ($connexio);
    
  
?>