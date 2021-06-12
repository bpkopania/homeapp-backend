<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/tasks.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate category object
  $tasks = new Task($db);

  // tasks read query
  $result = $tasks->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
        // Cat array
        $cat_arr = array();
        $cat_arr['tasks'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $cat_item = array(
            'id' => $id,
            'name' => $name,
            'data' => $data,
            'description' => $description,
            'priority' => $priority
          );

          // Push to "data"
          array_push($cat_arr['tasks'], $cat_item);
        }

        // Turn to JSON & output
        //$datatemp->data = array($cat_arr);
        $arr=array($cat_arr['tasks']);
        //echo json_encode($arr);
        //echo json_encode(array($cat_arr));
        //$out = (array)$cat_arr;
        //print_r($out);
        echo json_encode($cat_arr);

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No Elements Found')
        );
  }
?>