w<?php
$db = mysqli_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'music') or die(mysqli_error($db));

// select the movie titles and their genrmbre, persona_nomComple FROM music LEFT JOIN persona e after 1990
$query = 'SELECT c.name, e.genero, p.nombre FROM cancion as c, persona as p, estilos as e where c.genero = e.id and c.cantante = p.id';
$result = mysqli_query($db,$query) or die(mysqli_error($db));

// show the results
while ($row = mysqli_fetch_assoc($result)) {
	extract($row);
	echo 'Cancion: '. $name . ', Genero:  ' . $genero . ', Cantante: ' . $nombre . '<br>';
}
?>
