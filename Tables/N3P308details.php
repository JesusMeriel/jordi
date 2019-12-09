<html>
 </head>
 <body>
 
<?php
//function generate_ratings($rating) {
//    $movie_rating = '';
//    for ($i = 0; $i < $rating; $i++) {
//        $movie_rating .= '<img src="star.png" alt="star"/>';
//    }
//    return $movie_rating;
//}
$style = "<style> .estrella{ clip-path: inset(0% 50% 0% 0%); } </style>";
function generate_ratings($rating) {
    $movie_rating = '';
    for ($i = 0; $i < $rating; $i++) {
        
        $movie_rating .= '<img src="star.png" alt="star"/>';
    }
    return $movie_rating;
}


function generate_med($med) {
    $rest = $med%10;
    $med = $med*10;
    $med = $med%10;
    $med2='';
    for ($i = 0; $i < $rest; $i++) {
        
        $med2 .= '<img src="star.png" alt="star"/>';
    }
    $med2 .= '<img  style="clip-path: inset(0% '.$med.'0% 0% 0%);" src="star.png" alt="star"/>';

    return $med2;
}

// take in the id of a director and return his/her full name
function get_director($persona_id) {

    global $db;

    //$query = 'SELECT people_fullname FROM people WHERE  people_id = ' . $director_id;
    $query = 'SELECT p.nombre FROM persona as p WHERE p.persona_id = '. $persona_id;
    
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $nombre;
}

// take in the id of a lead actor and return his/her full name
function get_leadactor($estilos_id) {

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
//function get_movietype($type_id) {
//
//    global $db;
//
//    $query = 'SELECT p.nombre FROM persona as p WHERE p.persona_id = ' . $type_id;
//    $result = mysql_query($query, $db) or die(mysql_error($db));
//
//    $row = mysql_fetch_assoc($result);
//    extract($row);
//
//    return $nombre;
//}

// function to calculate if a movie made a profit, loss or just broke even
//function calculate_differences($takings, $cost) {
//
//    $difference = $takings - $cost;
//
//    if ($difference < 0) {     
//        $color = 'red';
//        $difference = '$' . abs($difference) . ' million';
//    } elseif ($difference > 0) {
//        $color ='green';
//        $difference = '$' . $difference . ' million';
//    } else {
//        $color = 'blue';
//        $difference = 'broke even';
//    }
//
//    return '<span style="color:' . $color . ';">' . $difference . '</span>';
//}

//connect to MySQL
//connect to mysqli
$db = mysqli_connect('localhost', 'root', '') or  die ('Unable to connect. Check your connection parameters.');

// make sure you're using the right database
mysqli_select_db($db, 'music') or die(mysqli_error($db));

// retrieve information
//$query = 'SELECT movie_name, movie_year, movie_director, movie_leadactor, movie_type, movie_running_time, movie_cost, movie_takings FROM movie WHERE movie_id = ' . $_GET['movie_id'];
//$query = 'SELECT c.name, c.year, p.nombre, p.pais, e.genero, c.duracion, p.edad FROM cancion as c, persona as p, estilos as e WHERE c.cancion_id = ' . $_GET['song_id'];
$query = 'SELECT p.persona_id, e.estilos_id, c.cancion_id, c.name, p.nombre, c.year, p.pais, e.genero, c.duracion, p.edad FROM cancion as c, persona as p, estilos as e WHERE c.genero = e.estilos_id and c.cantante = p.persona_id and c.cancion_id = ' .$_GET['song_id'];
//$query = 'SELECT name from cancion';

$result = mysqli_query($db, $query) or die(mysqli_error($db));

$row = mysqli_fetch_assoc($result);

$cancion         = $row['name'];
$cantante     = get_director($row['persona_id']);
$genero    = get_leadactor($row['estilos_id']);
$year         = $row['year'];
$duracion = $row['duracion'] .' mins';
//o$movie_takings      = $row['movie_takings'] . ' million';
$edad         = $row['edad'] . ' años';
//$movie_health       = calculate_differences($row['movie_takings'], $row['movie_cost']);

// display the information
echo <<<ENDHTML
<html>
 <head>
  <title>Details and Reviews for: $cancion</title>
 </head>
 <body>
  <div style="text-align: center;">
   <h2>$cancion</h2>
   <h3><em>Details</em></h3>
   <table cellpadding="2" cellspacing="2"
    style="width: 70%; margin-left: auto; margin-right: auto;">
    <tr>
     <td><strong>Title</strong></strong></td>
     <td>$cancion</td>
     <td><strong>Release Year</strong></strong></td>
     <td>$year</td>
    </tr><tr>
     <td><strong>cantante</strong></td>
     <td>$cantante</td>
     <td><strong>edad</strong></td>
     <td>$edad<td/>
    </tr><tr>
     <td><strong>Lead Actor</strong></td>
     <td>$genero</td>
    </tr><tr>
     <td><strong>duracion</strong></td>
     <td>$duracion</td>
    </tr>
   </table>
ENDHTML;
$ord = "";
// retrieve reviews for this movie
if(isset($_GET["ord"])){
    $ord = $_GET["ord"];
}

if($ord == "DESC"){
    $ord = "ASC";
}else if($ord == "ASC"){
    $ord = "DESC";
}else{
    $ord="ASC";
}

echo $ord;

$query = 'SELECT song_review, review_id, review_date, review_nom, review_coment, review_rating FROM reviews WHERE song_review = ' . $_GET['song_id'] . ' ORDER BY review_date '. $ord;

$result = mysqli_query($db, $query) or die(mysqli_error($db));  
$song = $_GET['song_id'];

// display the reviews
echo <<<ENDHTML
   <h3><em>Reviews</em></h3>
   <table cellpadding="2" cellspacing="2"
    style="width: 90%; margin-left: auto; margin-right: auto;">
    <tr>
     <th style="width: 7em;"><a href="N3P308details.php?ord=$ord&song_id=$song">Date</a></th>
     <th style="width: 10em;"><a href="N3P308details.php?ord=$ord&song_id=$song">Reviewer</a></th>
     <th><a href="N3P308details.php?ord=$ord&song_id=$song">Comments</a></th>
     <th style="width: 5em;"><a href="N3P308details.php?ord=$ord&song_id=$song">Rating</a></th>
    </tr>
ENDHTML;
$cont=0;
$med=0;
$rest=0;
while ($row = mysqli_fetch_assoc($result)) {
    $cont++;
    $date = $row['review_date'];
    $name = $row['review_nom'];
    $comment = $row['review_coment'];
    $rating = generate_ratings($row['review_rating']);
    $med = $med + $row['review_rating'];
    if($cont%2==0){
      echo <<<ENDHTML
      <tr style="background-color: green;">
        <td style="vertical-align:top; text-align: center;">$date</td>
        <td style="vertical-align:top; text-align: center;">$name</td>
        <td style="vertical-align:top; text-align: center;">$comment</td>
        <td style="vertical-align:top; text-align: center;">$rating</td>
      </tr>
ENDHTML;
    }else{
      echo <<<ENDHTML
    <tr style="background-color: blue;color: white;">
      <td style="vertical-align:top; text-align: center;">$date</td>
      <td style="vertical-align:top; text-align: center;">$name</td>
      <td style="vertical-align:top; text-align: center;">$comment</td>
      <td style="vertical-align:top; text-align: center;">$rating</td>
    </tr>
ENDHTML;
    }
    
}
$med = $med/$cont;
$med2 = generate_med($med);
echo <<<ENDHTML
    <tr style=" width: 100em;">
      <td style="vertical-align:top; text-align: center;">----</td>
      <td style="vertical-align:top; text-align: center;">----</td>
      <td style="vertical-align:top; text-align: center;">----</td>
      <td style="vertical-align:top; text-align: center;"><strong>Media</strong></td>
    </tr>
    <tr style=" width: 100em;">
      <td style="vertical-align:top; text-align: center;"></td>
      <td style="vertical-align:top; text-align: center;"></td>
      <td style="vertical-align:top; text-align: center;"></td>
      <td style="vertical-align:top; text-align: center;">$med2</td>
    </tr>
ENDHTML;

echo <<<ENDHTML
  </div>
 </body>
</html>
ENDHTML;

?>
