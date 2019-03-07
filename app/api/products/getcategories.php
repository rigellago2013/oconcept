<?php
    if($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'get' ){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");

        include_once '../../../library/database.php';
        include_once '../../models/Products.php';

        $database = new Database();
        $db = $database->getConnection();
        $product = new Product($db);

        $data = $product->getcategory();


        if(!empty( $data )) {

            http_response_code(200);
            echo json_encode(['data' => $data, 'status' => 200, 'message' => 'success']);

        } else {

            http_response_code(404);
            echo json_encode(['data' => null, 'status' => 404, 'message' => 'Error getting categories.']);

        }



    } else {

        http_response_code(403);

    }

?>
