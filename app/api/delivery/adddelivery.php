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
        $data = json_decode(file_get_contents("php://input"));

        $delivery->trackingNumber = $data->productid;
        $delivery->orderId = $data->orderId;
        $delivery->description = $data->description;
        $delivery->courierId = $data->courierId;

    } else {

        http_response_code(403);
        echo json_encode(['status' => 200, 'message' => 'success']);

    }


?>
