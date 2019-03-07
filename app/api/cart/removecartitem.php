<?php
    if($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'GET' ) {

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');


    include_once '../../../library/database.php';
    include_once '../../models/Cart.php';

    $database = new Database();
    $db = $database->getConnection();
    $cart = new Cart($db);

    if ($cart->removecartitem($_GET['id'], $_GET['product_id'], $_GET['quantity']) ) {

            http_response_code(200);
            echo json_encode(['status' => 200, 'message' => 'success']);

    } else {

            http_response_code(403);
            echo json_encode(['status' => 403, 'message' => 'success']);

    }

    }
?>
