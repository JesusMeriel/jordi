<?php
$db = mysqli_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'music') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'cancion':
        $query = 'INSERT INTO cancion (name, genero, year, duracion, cantante) VALUES ("' . $_POST['name'] . '", ' . $_POST['genero'] . ', ' . $_POST['year'] . ', ' . $_POST['duracion'] . ', ' . $_POST['cantante'] . ')';
        break;
    case 'persona':
        $query = 'INSERT INTO persona (nombre, pais, edad) VALUES ("' . $_POST['nombre'] . '", "' . $_POST['pais'] . '", ' . $_POST['edad']. ')';
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'cancion':
        $query = 'UPDATE cancion SET name = "' . $_POST['name'] . '", genero = ' . $_POST['genero'] . ', year = ' . $_POST['year'] . ', duracion = ' . $_POST['duracion'] . ', cantante = ' . $_POST['cantante'] . ' WHERE cancion_id = ' . $_POST['cancion_id'];
        break;
    case 'persona':
        $query = 'UPDATE persona SET nombre = "' . $_POST['nombre'] . '", pais = "' . $_POST['pais'] . '", edad = ' . $_POST['edad'] .' WHERE persona_id = ' . $_POST['persona_id'];
        break;
    }
    break;
}

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
 </body>
</html>
