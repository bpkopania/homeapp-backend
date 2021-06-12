<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Acces-Control-Allow-Methods: DELETE');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers,Content-Type,Acces-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/budget.php';

    //Instantiate DB and conect
    $database = new Database();
    $db = $database->connect();

    //Instantiate blog shop object
    $task = new Budget($db);

    //Get raw tasked data
    $data = json_decode(file_get_contents("php://input"));

    //Set ID to delete
    $task->id = $data->id;

    //delete task task
    if($task->delete())
    {
        echo json_encode(
            array('message' => 'income/output Deleted')
        );
    }
    else
    {
        echo json_encode(
            array('message' => 'income/output Deleting Failed')
        );
    }
?>