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
    $data = $product->getSellerProducts($_GET['user_id']);

    if($data){
        http_response_code(200);
        echo json_encode(['data' => $data, 'status' => 200, 'message' => 'success']);
    } else {
        http_response_code(404);
        echo json_encode(array('data' => null, 'status' => 403,  "message" => "No Products Available."));
    }

} else {

        http_response_code(403);

    }
?>
