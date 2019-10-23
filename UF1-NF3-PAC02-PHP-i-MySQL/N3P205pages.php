<?php
$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'music') or die(mysqli_error($db));
$noRegistros = 2; //Registros por página
$pagina = 1; //Por defecto pagina = 1
//$buskr='n';
if($_GET['pagina'])
    $pagina = $_GET['pagina']; //Si hay pagina, lo asigna
$buskr=$_GET['searchs']; //Palabra a buscar

    
//Utilizo el comando LIMIT para seleccionar un rango de registros
$sSQL = "SELECT * FROM estilos WHERE genero LIKE '%$buskr%' LIMIT ".($pagina-1)*$noRegistros.",$noRegistros";
//$sSQL = "SELECT * FROM estilos WHERE genero LIKE '%$buskr%' LIMIT 3, 1";
$result = mysqli_query($db,$sSQL) or die(mysqli_error($db));

//Exploracion de registros
echo "<table>";
while($row = mysqli_fetch_array($result)) { 
	echo "<tr><td height=80 align=center>";
	echo $row["id"]."<br>";
	echo "</td><td>".$row["genero"]."</td></tr>";
}

//Imprimiendo paginacion
$sSQL = "SELECT count(*) FROM estilos WHERE genero LIKE '%$buskr%'"; //Cuento el total de registros
$result = mysqli_query($db,$sSQL);
$row = mysqli_fetch_array($result);
$totalRegistros = $row["count(*)"]; //Almaceno el total en una variable


$noPaginas = $totalRegistros/$noRegistros; //Determino la cantidad de paginas
$noPaginas++;
?>

<tr>
    <td colspan="2" align="center"><?php echo "<strong>Total registros: </strong>".$totalRegistros; ?></td>
    <td colspan="2" align="center"><?php echo "<strong>Pagina: </strong>".$pagina; ?></td>
    <?php
    if($pagina < $noPaginas){
    $paginamenos = $pagina;
    $paginamenos--;
    $pagina++;
    }
    ?>
    <?php
    if($paginamenos >= 1){
    ?>
    <td colspan="2" align="center"><?php echo "<p><a href='N3P205pages.php?pagina=$paginamenos'>Pagina anterior</p>";?></td>
    <?php
    }
    $noPaginas--;
    if($pagina <= $noPaginas){
    ?>
    <td colspan="2" align="center"><?php echo "<p><a href='N3P205pages.php?pagina=$pagina'>Pagina siguiente</p>";?></td>
    <?php
    }
    ?>
</tr>
</table>