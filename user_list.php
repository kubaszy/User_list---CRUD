
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

$query = "SELECT * from user";

 $statement = $pdo->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();

//  var_dump($result);
 foreach($result as $row)
 {
  $output[] = array(
   'index'   => $row["id_user"],
   'name'   => $row["name"],
   'surname'   => $row["surname"],
   'telephone'   => $row["telephone"],
   'street'   => $row["street"],
   'number'   => $row["number"],
   'zip'   => $row["zip"],
   'city'  => $row["city"]
  );
 }
 echo json_encode($output);


?>
