<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers,Content-Type,Acces-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/budget.php';

    //Instantiate DB and conect
    $database = new Database();
    $db = $database->connect();

    //Instantiate blog post object
    $budget = new Budget($db);

    //Get raw budgeted data
    $data = json_decode(file_get_contents("php://input"));

    $budget->name = $data->name;
    $budget->amount = $data->amount;
    //$budget->in = $data->in;
    //$budget->endPrice = $data->endPrice;

    //create budget
    if($budget->create())
    {
        echo json_encode(
            array('message' => 'new new budget Created')
        );
    }
    else
    {
        echo json_encode(
            array('message' => 'new new budget Creation Failed')
        );
    }
?>