<?php
    if( $_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'post' ) {

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once '../../../library/database.php';
        include_once '../../models/Bidding.php';

        $database = new Database();
        $db = $database->getConnection();
        $bidding = new Bidding($db);
        $data = json_decode(file_get_contents("php://input"));

        $res =  $bidding->addcustomerbid($data->id,$data->amount);

        if($res) {

            http_response_code(200);
            echo json_encode(['status' => 200, 'message' => 'success']);

        } else {

             http_response_code(403);
            echo json_encode(['status' => 403, 'message' => 'bad request']);

        }
    }
?>
