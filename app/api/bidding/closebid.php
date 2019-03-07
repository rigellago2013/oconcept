<?php
      header("Access-Control-Allow-Origin: *");
      header("Content-Type: application/json; charset=UTF-8");
      header("Access-Control-Allow-Methods: GET");
      header("Access-Control-Max-Age: 3600");
      header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once '../../../library/database.php';
        include_once '../../models/Bidding.php';

        $database = new Database();
        $db = $database->getConnection();
        $bidding = new Bidding($db);

        $res = $bidding->closeBid($_GET['id'], $_GET['commentid']);

        if($res) {
            http_response_code(200);
            echo json_encode(['status' => 200, 'message' => 'success']);
        } else {
            http_response_code(403);
            echo json_encode(['status' => 403, 'message' => 'bad request']);
        }




?>
