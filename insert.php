 <?php 
include 'db.php';

 $data = [
    'name' => $_POST["name"],
    'surname' => $_POST["surname"],
    'telephone' => $_POST["telephone"],
    'street' => $_POST["street"],
    'number' => $_POST["number"],
    'zip' => $_POST["zip"],
    'city' => $_POST["city"],
];
$sql = "INSERT INTO user (name, surname, telephone, street, number, zip, city) VALUES (:name, :surname, :telephone, :street, :number, :zip, :city)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);

if($stmt) {
	header('Location: index.php'); 
}
else {
	echo "ERROR";
}

?>