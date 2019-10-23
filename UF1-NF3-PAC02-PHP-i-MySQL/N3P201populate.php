<?php
// connect to mysqli
$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');

//make sure you're using the correct database
mysqli_select_db($db,'music') or die(mysqli_error($db));

// insert data into the movie table
$query = 'INSERT INTO cancion
    VALUES
        (1, "blind", 1, 1994, 4, 2),
        (2, "my generation", 1, 2000, 4, 3),
        (3, "cant stop", 5, 2002, 4, 1),
        (4, "insane in the brain", 7, 1993, 3, 1)';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the movietype table
$query = 'INSERT INTO estilos 
    VALUES 
        (1, "nu metal"),
        (2, "rock"), 
        (3, "pop"),
        (4, "punk"), 
        (5, "funk"),
        (6, "heavy metal"),
        (7, "rap"),
        (8, "country")';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the people table
$query  = 'INSERT INTO persona
    VALUES 
        (1, "Anthony Kiedis", "estados unidos", 56),
        (2, "jonathan davis", "estados unidos", 48),
        (3, "fred durst", "estados unidos", 49),
        (4, "b-real", "estados unidos", 49),
        (5, "conway twitty", "estados unidos", 86),
        (6, "billie joe", "estados unidos", 47)';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'Data inserted successfully!';
?>






?>
<tr>
    <td colspan="2" align="center"><? echo "<strong>Total registros: </strong>".$totalRegistros; ?></td>
    <td colspan="2" align="center"><? echo "<strong>Pagina: </strong>".$pagina; ?></td>
</tr>
<tr bgcolor="f3f4f1">
    <td colspan="4" align="right"><strong>Pagina:
<?php
for($i=1; $i<$noPaginas+1; $i++) { //Imprimo las paginas
	if($i == $pagina)
		echo "<font color=red>$i </font>"; //A la pagina actual no le pongo link
	else
		echo "<a href=\"?pagina=".$i."&searchs=".$buskr."\" style=color:#000;> ".$i."</a>";
}
?>
	</strong></td>
</tr>
</table>
