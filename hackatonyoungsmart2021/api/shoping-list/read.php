<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/shoping-list.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate category object
  $shop = new Shop($db);

  // shop read query
  $result = $shop->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
        // Cat array
        $cat_arr = array();
        $cat_arr['shop'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $cat_item = array(
            'id' => $id,
            'name' => $name,
            'amount' => $amount,
            'price' => $price,
            'endPrice' => $endPrice
          );

          // Push to "data"
          array_push($cat_arr['shop'], $cat_item);
        }

        // Turn to JSON & output
        //$out = (array) $cat_arr;
        echo json_encode($cat_arr);

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No Elements Found')
        );
  }
?>