<?php
//$name=$_POST["name"];
//$data=$_POST["data"];
//$des=$_POST["description"];

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acces-Control-Allow-Methods: POST');
header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers,Content-Type,Acces-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/tasks.php';

//Instantiate DB and conect
// $database = new Database();
// $db = $database->connect();
// $task = new Task($db);

$name = "stsh3";
$data ="2021-12-06";
$des = "stsh3";
//$pol=mysqli_connect('localhost','root','','family');


$query = 'INSERT INTO tasks 
         SET 
        name = '.$name.', 
        data = '.$data.',
        description = '.$des;

    //       // Prepare statement
    //       $stmt = $conn->prepare($query);


    //       // Execute query
    //       if($stmt->execute()) {
    //         return true;
    //       }

    //       // Print error if something goes wrong
    //   printf("Error: %s.\n", $stmt->error);

      //return false;

      //$rez=mysqli_query($pol,$query);

      //mysqli_close($pol);


      $pol=mysqli_connect('localhost','root','','family');
$zap='INSERT INTO INSERT INTO `tasks`(`id`, `name`, `data`, `description`, `priority`) 
VALUES ('.rand().','.$name.','.$data.','.$des.',0)';
$rez=mysqli_query($pol,$zap);
// while($x=mysqli_fetch_array($rez))
// {
// 	echo "Klient: $x[1] $x[2], data urodzenia: $x[7] <br>";
// }
mysqli_close($pol);
?>