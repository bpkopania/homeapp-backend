<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers,Content-Type,Acces-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/shoping-list.php';

    //Instantiate DB and conect
    $database = new Database();
    $db = $database->connect();

    //Instantiate blog post object
    $shop = new Shop($db);

    //Get raw shoped data
    $data = json_decode(file_get_contents("php://input"));

    $shop->name = $data->name;
    $shop->amount = $data->amount;
    $shop->price = $data->price;
    //$shop->endPrice = $data->endPrice;

    //create shop
    if($shop->create())
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