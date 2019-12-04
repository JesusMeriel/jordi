<?php
$db = mysqli_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'music') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Music database</title>
  <style type="text/css">
   th { background-color: #999;}
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
 </head>
 <body>
 <table style="width:100%;">
  <tr>
   <th colspan="2">Movies <a href="movie.php?action=add">[ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM cancion';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width:75%;">'; 
    echo $row['name'];
    echo '</td><td>';
    echo ' <a href="movie.php?action=edit&id=' . $row['cancion_id'] . '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=cancion&id=' . $row['cancion_id'] . '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  <tr>
    <th colspan="2">People <a href="people.php?action=add"> [ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM persona';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width: 25%;">'; 
    echo $row['nombre'];
    echo '</td><td>';
    echo ' <a href="people.php?action=edit&id=' . $row['persona_id'] .'"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=persona&id=' . $row['persona_id'] . '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  </table>
 </body>
</html>
