<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/budget_copy.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate category object
  $budget = new Budget($db);

  // budget read query
  $result = $budget->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
        // Cat array
        $cat_arr = array();
        $cat_arr['spendings'] = array();
        $cat_arr['sumarise'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $cat_item = array(
            'id' => $id,
            'name' => $name,
            'amount' => $amount
          );

          // Push to "data"
          array_push($cat_arr['spendings'], $cat_item);
        }

        $result=$budget->incomeSum();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $result=$budget->expensesSum();
        $row2 = $result->fetch(PDO::FETCH_ASSOC);
        extract($row2);
        $cat_item = array(
          'income' => $income,
          'expenses' => $expenses,
          'balance' => $income+$expenses
        );
        array_push($cat_arr['sumarise'], $cat_item);
        // Turn to JSON & output
        //echo json_encode(array($cat_arr['data'],$sum_arr['sumarise']));
        //echo json_encode($sum_arr);
        //print_r ($cat_arr['sumarise']);
        echo json_encode($cat_arr);


  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No Elements Found')
        );
  }
?>