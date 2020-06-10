<?php

//insert_chat.php

// include('database_connection.php');

// session_start();

// $data = array(
// 	':to_user_id'		=>	$_POST['to_user_id'],
// 	':from_user_id'		=>	$_SESSION['user_id'],
// 	':chat_message'		=>	$_POST['chat_message'],
// 	':status'			=>	'1'
// );

// $query = "
// INSERT INTO chat_message 
// (to_user_id, from_user_id, chat_message, status) 
// VALUES (:to_user_id, :from_user_id, :chat_message, :status)
// ";

// $statement = $connect->prepare($query);

// if($statement->execute($data))
// {
// 	echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
// }

?>


<?php

//insert_chat.php

// include('database_connection.php');
require('abstract.databoundobject.php');
require('mapping.php');
require('pdofactory.php');
include 'conexion.php';

session_start();


if((isset($_SESSION['user_id']))&&(isset($_POST['to_user_id']))&&(isset($_POST['chat_message']))){
	$to_user_id = $_POST['to_user_id'];
	$from_user_id = $_SESSION['user_id'];
	$chat_message = $_POST['chat_message'];
	$status = '1';
	// echo "holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
}

$strDSN = "mysql:dbname=chat;host=localhost;";
$objPDO = PDOFactory::GetPDO($strDSN, "root", "", 
    array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$objUser = new LogData($objPDO);


$objUser->setto_user_id($to_user_id)->setfrom_user_id($from_user_id)->setchat_message($chat_message)->setstatus($status);


 $objUser->Save();
       // echo $objUser;
        
        // print "Saving...<br />";
        

        


// if($objUser->execute($data))
// {
// 	echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
// }

?>