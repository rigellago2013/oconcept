<?php
if($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'get' ){

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: access");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Credentials: true");
        header('Content-Type: application/json');

        include_once '../../../library/database.php';
        include_once '../../models/Bidding.php';

        $database = new Database();
        $db = $database->getConnection();
        $bidding = new Bidding($db);
        $res = $bidding->getCustomerBids($_GET['id']);

        if(!empty( $res )) {

            http_response_code(200);
            echo json_encode(['data' => $res, 'status' => 200, 'message' => 'success']);

        } else {

            http_response_code(403);
            echo json_encode(['data' => null, 'status' => 403, 'message' => 'Error getting data.']);
        }

    } else {
        http_response_code(403);
    }

?>
