<?php
if($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'post' ) {

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../../../library/database.php';
    include_once '../../models/Products.php';

    $database = new Database();
    $db = $database->getConnection();
    $users = new Users($db);


    $product->id = $_POST['id'];

    $product->name = $data->name;
    $product->description = $data->description;
    $product->type_id = $data->type_id;
    $product->cost = $data->unit_cost;
    $product->quantity = $data->quantity;
    $product->reordering_point = $data->reordering_point;


    if($product->update()){

        http_response_code(200);
        echo json_encode(array("status" => 200, "message" => "Product was updated."));

    }

    // if unable to update the product, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to update product."));
    }
} else {

        http_response_code(403);

    }
?>
