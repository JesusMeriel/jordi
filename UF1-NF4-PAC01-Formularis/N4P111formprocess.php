<html>
 <head>
  <title>Say My Name</title>
 </head>
 <body>
<?php

$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'music') or die(mysqli_error($db));


 $query = 'INSERT INTO reviews (review_nom, review_date, review_rating, song_review, review_coment) VALUES ("' . $_POST['nombre'] . '", "' . $_POST['date'] . '", ' . $_POST['rating'] . ', ' . $_POST['song'] . ', "' . $_POST['comentario'] . '")';
 $result = mysqli_query($db, $query) or die(mysqli_error($db));    
 
 $query = 'SELECT * FROM reviews';
 $result = mysqli_query($db, $query) or die(mysqli_error($db));
 $table = "<table><tr><td>Nom</td><td>Fecha</td><td>Calificacion</td><td>Cancion</td><td>comentarios</td></tr>";
 while ($row = mysqli_fetch_assoc($result)) {
    $table .= "<table><tr><td>". $row['review_nom'] ."</td><td>". $row['review_date'] ."</td><td>". $row['review_rating'] ."</td><td>". $row['song_review'] ."</td><td>". $row['review_coment'] ."</td></tr>";
 }
 $table .= "</tbale>";
 echo $table;

?>
  </pre>
 </body>
</html>

