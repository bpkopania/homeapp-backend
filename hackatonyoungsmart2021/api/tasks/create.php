<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers,Content-Type,Acces-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/tasks.php';

    //Instantiate DB and conect
    $database = new Database();
    $db = $database->connect();

    //Instantiate blog post object
    $task = new Task($db);

    //Get raw tasked data
    $data = json_decode(file_get_contents("php://input"));

    $task->name = $data->name;
    $task->data = $data->data;
    $task->description = $data->description;
    $task->priority = $data->priority;

    //create task
    if($task->create())
    {
        echo json_encode(
            array('message' => 'new elemnt in list Created')
        );
    }
    else
    {
        echo json_encode(
            array('message' => 'new elemnt in list Creation Failed')
        );
    }
?>