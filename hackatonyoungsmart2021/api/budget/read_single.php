<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/budget.php';

    //Instantiate DB and conect
    $database = new Database();
    $db = $database->connect();

    //Instantiate blog post object
    $task = new Budget($db);


    $dat = json_decode(file_get_contents("php://input"));

    $task->id = $dat->id;
   //get ID
   //$task->id = isset($_GET['id']) ? $_GET['id'] : die();

   //get task
   $task->read_single();

   //create array
    $task_arr = array(
        'id' => $task->id,
        'name' => $task->name,
        'amount' => $task->amount,
        //'price' => $task->price,
        //'endPrice' => $task->endPrice,
        //'category_name' => $task->category_name
    );

    //make JSON
    print_r(json_encode($task_arr));
?>