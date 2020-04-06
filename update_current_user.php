 <?php 
include 'db.php';
	ob_start();
	$id = $_POST["id"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $telephone = $_POST["telephone"];
    $street = $_POST["street"];
    $number = $_POST["number"];
    $zip = $_POST["zip"];
    $city = $_POST["city"];

$liczba = $pdo->exec("UPDATE user SET name='$name' , surname='$surname' , telephone='$telephone' , street='$street' , number='$number' , zip='$zip' , city='$city' WHERE id_user='$id'");

		if($liczba > 0)
		{
			header('Location: index.php'); 
		}
		else
		{
			header('Location: index.php'); 
		}
ob_end_flush();
?>