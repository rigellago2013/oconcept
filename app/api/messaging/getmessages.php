<?php
  if($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'get' ){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");

        include_once '../../../library/database.php';
        include_once '../../models/Messaging.php';

        $database = new Database();
        $db = $database->getConnection();
        $messaging = new Messaging($db);

        $data = $messaging->getMessages();

        if(!empty($data)) {

            http_response_code(200);
            echo json_encode(['data' => $data, 'status' => 200, 'message' => 'success']);

        } else {
            http_response_code(403);
            echo json_encode(['data' => null, 'status' => 403, 'message' => 'error']);
        }

  } else {
    http_response_code(500);
  }


?>
