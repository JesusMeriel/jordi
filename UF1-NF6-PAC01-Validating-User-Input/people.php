<?php
$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'music') or die(mysqli_error($db));

if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT * FROM persona where persona_id ='. $_GET["id"];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $nombre = '';
    $pais = '';
    $edad = 0;
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Movie</title>
 </head>
 <?php
  if (isset($_GET['error']) && $_GET['error'] != '') {
  echo '<div id="error" style="background-color:black;color:white;text-align:center;padding:5px;">' . $_GET['error'] . '</div>';
  }
 ?>
 <body>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=persona" method="post">
   <table>
    <tr>
     <td>Nombre del cantante</td>
     <td><input type="text" name="nombre" value="<?php echo $nombre; ?>"/></td>
    </tr><tr>
     <td>Pais de nacimiento</td>
     <td><input type="text" name="pais" value="<?php echo $pais; ?>"/></td>
    </tr><tr>
     <td>Edad del cantante</td>
     <td><input type="text" name="edad" value="<?php echo $edad; ?>"/></td>
    </tr><tr>
     <td>Mail</td>
     <td><input type="text" name="mail" value=""/></td>
    </tr><tr>
     <td colspan="2" style="text-align: center;">
<?php
if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="persona_id" />';
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
