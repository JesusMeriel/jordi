<?php
// take in the id of a director and return his/her full name
function get_name($cancion_id) {

    global $db;

    //$query = 'SELECT people_fullname FROM people WHERE  people_id = ' . $director_id;
    $query = 'SELECT c.name FROM cancion as c where  c.cancion_id = '.$cancion_id;
    
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $name;
}

// take in the id of a lead actor and return his/her full name
function get_genero($estilos_id) {

    global $db;

    //$query = 'SELECT people_fullname FROM people  WHERE people_id = ' . $leadactor_id;
    $query = 'SELECT e.genero FROM estilos as e where e.estilos_id = '.$estilos_id;
    
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $genero;
}

// take in the id of a movie type and return the meaningful textual
// description
function get_nombre($persona_id) {

    global $db;

    //$query = 'SELECT  movietype_label FROM movietype WHERE movietype_id = ' . $type_id;
    $query = 'SELECT p.nombre FROM cancion as c, persona as p where  p.persona_id = ' .$persona_id;
    
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $nombre;
}

//connect to mysqli
$db = mysqli_connect('localhost', 'root', '') or  die ('Unable to connect. Check your connection parameters.');

// make sure you're using the right database
mysqli_select_db($db, 'music') or die(mysqli_error($db));

// retrieve information
//$query = 'SELECT movie_id, movie_name, movie_year, movie_director movie_leadactor, movie_type FROM movie ORDER BY movie_name ASC, movie_year DESC';
$query = 'SELECT p.persona_id, e.estilos_id, c.cancion_id, c.name, c.year, c.duracion, e.genero, p.nombre FROM cancion as c, persona as p, estilos as e where c.genero = e.estilos_id and c.cantante = p.persona_id ORDER BY year ASC';global $db;

$result = mysqli_query($db, $query) or die(mysqli_error($db));

// determine number of rows in returned result
$num_movies = mysqli_num_rows($result);

$table = <<<ENDHTML
<div style="text-align: center;">
 <h2>Movie Review Database</h2>
 <table border="1" cellpadding="2" cellspacing="2"
  style="width: 70%; margin-left: auto; margin-right: auto;">
  <tr>
   <th>Cancion</th>
   <th>Duracion</th>
   <th>Año de lanzamiento</th>
   <th>Genero musical</th>
   <th>Cantante</th>
  </tr>
ENDHTML;

// loop through the results
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    
    $name = get_name($cancion_id);
    $genero = get_genero($estilos_id);
    $nombre = get_nombre($persona_id);

    $table .= <<<ENDHTML
    <tr>
     <td><a href="N3P308details.php?song_id=$cancion_id">$name</a></td>
     <td>$duracion minutos</td>
     <td>$year</td>
     <td>$genero</td>
     <td>$nombre</td>
    </tr>
ENDHTML;
}

$table .= <<<ENDHTML
 </table>
<p>$name Movies</p>
</div>
ENDHTML;

echo $table;
?>
