<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/shoping-list.php';

    //Instantiate DB and conect
    $database = new Database();
    $db = $database->connect();

    //Instantiate blog post object
    $shop = new Shop($db);


    $data = json_decode(file_get_contents("php://input"));

    $shop->id = $data->id;
   //get ID
   //$shop->id = isset($_GET['id']) ? $_GET['id'] : die();

   //get shop
   $shop->read_single();

   //create array
    $shop_arr = array(
        'id' => $shop->id,
        'name' => $shop->name,
        'amount' => $shop->amount,
        'price' => $shop->price,
        'endPrice' => $shop->endPrice,
        //'category_name' => $shop->category_name
    );

    //make JSON
    print_r(json_encode($shop_arr));
?>