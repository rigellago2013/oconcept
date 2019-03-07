<?php
if($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'get' ) {

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');

    include '../../../library/database.php';
    include '../../models/User.php';


    $database = new Database();
    $db = $database->getConnection();
    $users = new User($db);

    $data = $users->getuser($_GET['id']);


    if($data) {

        http_response_code(200);
        echo json_encode(['data' => $data, 'status' => 200, 'message' => 'succeess']);

    } else {

        http_response_code(403);
        echo json_encode(['data' => null, 'status' => 403, 'message' => 'error']);

    }
}


?>
