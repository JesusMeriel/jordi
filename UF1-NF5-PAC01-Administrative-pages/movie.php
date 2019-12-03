<?php
$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'music') or die(mysqli_error($db));

if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT persona_id, name, genero, year, duracion, cantante FROM cancion, persona WHERE cancion_id = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $name = '';
    $genero = 0;
    $year = date('Y');
    $duracion = 0;
    $persona = 0;
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Movie</title>
 </head>
 <body>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=cancion" method="post">
   <table>
    <tr>
     <td>Nombre de la cancion</td>
     <td><input type="text" name="name" value="<?php echo $name; ?>"/></td>
    </tr><tr>
     <td>Genero</td>
     <td><select name="genero">
<?php
// select the movie type information
$query = 'SELECT estilos_id, genero FROM estilos ORDER BY genero';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// populate the select options with the results
while ($row = mysqli_fetch_assoc($result)) {
    
        if ($row['estilos_id'] == $genero) {
            echo '<option value="' . $row['estilos_id'] . '" selected="selected">';
        } else {
            echo '<option value="' . $row['estilos_id'] . '">';
        }
        echo $row['genero'] . '</option>';
    
}
?>
      </select></td>
    </tr><tr>
     <td>Song Year</td>
     <td><select name="year">
<?php
// populate the select options with years
for ($yr = date("Y"); $yr >= 1970; $yr--) {
    if ($yr == $year) {
        echo '<option value="' . $yr . '" selected="selected">' . $yr .
            '</option>';
    } else {
        echo '<option value="' . $yr . '">' . $yr . '</option>';
    }
}
?>
      </select></td>
    </tr><tr>
     <td>Cantante</td>
     <td><select name="cantante">
<?php
// select actor records
$query = 'SELECT persona_id, nombre FROM persona ORDER BY nombre';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// populate the select options with the results
while ($row = mysqli_fetch_assoc($result)) {
   
        if ($row['persona_id'] == $cantante) {
            echo '<option value="' . $row['persona_id'] .
                '" selected="selected">';
        } else {
            echo '<option value="' . $row['persona_id'] . '">';
        }
        echo $row['nombre'] . '</option>';
    
}
?>
    <tr>
     <td>Duracion</td>
     <td>
     <select name="duracion">
<?php


// populate the select options with the results
$dur=2;
while ($dur<=5) {
        if ($duracion == $dur) {
            echo '<option value="' . $dur . '" selected="selected">';
        } else {
            echo '<option value="' . $dur . '">';
        }
        echo $dur . '</option>';
        $dur++;
}
?>
     </select>
     </td>
    </tr>
<?php
//// select director records
//$query = 'SELECT
//        people_id, people_fullname
//    FROM
//        people
//    WHERE
//        people_isdirector = 1
//    ORDER BY
//        people_fullname';
//$result = mysqli_query($db, $query) or die(mysqli_error($db));
//
//// populate the select options with the results
//while ($row = mysqli_fetch_assoc($result)) {
//    foreach ($row as $value) {
//        if ($row['people_id'] == $movie_director) {
//            echo '<option value="' . $row['people_id'] .
//                '" selected="selected">';
//        } else {
//            echo '<option value="' . $row['people_id'] . '">';
//        }
//        echo $row['people_fullname'] . '</option>';
//    }
//}
?>
      </select></td>
    </tr><tr>
     <td colspan="2" style="text-align: center;">
<?php
if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="cancion_id" />';
}
?>
      <input type="submit" name="submit"
       value="<?php echo ucfirst($_GET['action']); ?>" />
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>