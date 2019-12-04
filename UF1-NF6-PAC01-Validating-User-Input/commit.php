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
        $error = array();
        $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
        if ((is_numeric($nombre))||(empty($nombre))) {
            $error[] = urlencode('Porfavor inserta un nombre correcto.');
        }
        $pais = isset($_POST['pais']) ? trim($_POST['pais']) : '';
        if ((is_numeric($pais))||(empty($pais))){
            $error[] = urlencode('Porfavor, inserta el nombre de un pais.');
        }
        $edad = isset($_POST['edad']) ? trim($_POST['edad']) : '';
        if ((empty($edad))||(!is_numeric($edad))) {
            $error[] = urlencode('Porfavor, inserta una edad.');
        }
        if (empty($_POST["mail"])) {
            $error[] = "Porfavor, inserta un mail <br>";
        } else {
            $mail = $_POST['mail'];
            // Queremos que el email tenga un formato adecuado
            if (!preg_match("/(^[^@]+@[^@]+\.[a-zA-Z]{2,}$)/", $mail)) {
                $error[] = "El mail que a insertado es incorrecto";
            }
        }


        if (empty($error)) {

            $query = 'INSERT INTO persona (nombre, pais, edad) VALUES ("' . $_POST['nombre'] . '", "' . $_POST['pais'] . '", ' . $_POST['edad']. ')';
            
        }else {
          header('Location:people.php?action=add' .
              '&error=' . join($error, urlencode('<br/>')));
        }
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'cancion':
        $query = 'UPDATE cancion SET name = "' . $_POST['name'] . '", genero = ' . $_POST['genero'] . ', year = ' . $_POST['year'] . ', duracion = ' . $_POST['duracion'] . ', cantante = ' . $_POST['cantante'] . ' WHERE cancion_id = ' . $_POST['cancion_id'];
        break;
    case 'persona':

        $error = array();
        $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
        if ((is_numeric($nombre))||(empty($nombre))) {
            $error[] = urlencode('Porfavor inserta un nombre correcto.');
        }
        $pais = isset($_POST['pais']) ? trim($_POST['pais']) : '';
        if ((is_numeric($pais))||(empty($pais))){
            $error[] = urlencode('Porfavor, inserta el nombre de un pais.');
        }
        $edad = isset($_POST['edad']) ? trim($_POST['edad']) : '';
        if ((empty($edad))||(!is_numeric($edad))) {
            $error[] = urlencode('Porfavor, inserta una edad.');
        }
        if (empty($_POST["mail"])) {
            $error[] = "Porfavor, inserta un mail <br>";
        } else {
            $mail = $_POST['mail'];
            // Queremos que el email tenga un formato adecuado
            if (!preg_match("/(^[^@]+@[^@]+\.[a-zA-Z]{2,}$)/", $mail)) {
                $error[] = "El mail que a insertado es incorrecto";
            }
        }


        if (empty($error)) {
            $query = 'UPDATE persona SET nombre = "' . $_POST['nombre'] . '", pais = "' . $_POST['pais'] . '", edad = ' . $_POST['edad'] .' WHERE persona_id = ' . $_POST['persona_id'];
        }else {
          header('Location:people.php?action=edit&id=' . $_POST['persona_id'] .
              '&error=' . join($error, urlencode('<br/>')));
        }
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
