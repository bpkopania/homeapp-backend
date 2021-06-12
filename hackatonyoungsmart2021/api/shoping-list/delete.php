<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Acces-Control-Allow-Methods: DELETE');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers,Content-Type,Acces-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/shoping-list.php';

    //Instantiate DB and conect
    $database = new Database();
    $db = $database->connect();

    //Instantiate blog shop object
    $shop = new Shop($db);

    //Get raw shoped data
    $data = json_decode(file_get_contents("php://input"));

    //Set ID to delete
    $shop->id = $data->id;

    //delete shop shop
    if($shop->delete())
    {
        echo json_encode(
            array('message' => 'Element Deleted')
        );
    }
    else
    {
        echo json_encode(
            array('message' => 'Element Deleting Failed')
        );
    }
?>