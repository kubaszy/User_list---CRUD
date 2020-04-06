<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';



$sql = "DELETE FROM user WHERE id_user =  :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);   
$stmt->execute();

if($stmt) {
	header('Location: index.php'); 
}
else {
	echo "ERROR";
}

?>
