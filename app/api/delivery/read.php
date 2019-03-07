<?php
    if($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'get' ){

        header("Access-Control-Allow-Origin: * ");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");

        include_once '../../../library/database.php';
        include_once '../../models/Delivery.php';

        $database = new Database();
        $db = $database->getConnection();
        $delivery = new Delivery($db);

        $data = $delivery->getDelivery($_GET['user_id']);

        if(!empty( $data )) {

            echo json_encode(['data' => $data, 'status' => 200, 'message' => 'success']);

        } else

            echo json_encode(['data' => null, 'status' => 404, 'message' => 'Error getting delivery.']);

    } else {

        http_response_code(403);

    }


?>
