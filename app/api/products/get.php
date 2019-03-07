<?php
if($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'get' ) {

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');

    include_once '../../../library/database.php';
    include_once '../../models/Products.php';

    $database = new Database();
    $db = $database->getConnection();

    $product = new Product($db);
    $product->id = $_GET['id'];

    $product->get();

    if($product->name!=null){

        $product_arr = array(
            "id" =>  $product->id,
            "name" => $product->name,
            "description" => $product->description,
            "unit_cost" => $product->cost,
            "type" => $product->type_id,
            "quantity" => $product->quantity,
            "reordering_point" => $product->reordering_point,
            "date_added" => date("M d, Y", strtotime($product->date_added)),
            "supplier" => $product->supplier_id,
            "image" => $product->image
        );

        http_response_code(200);
        echo json_encode($product_arr);

    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Product does not exist."));
    }

} else {

        http_response_code(403);

    }
?>
