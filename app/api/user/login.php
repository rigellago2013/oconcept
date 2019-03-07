<?php
    if( $_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'post' ) {

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include '../../../library/database.php';
    include '../../models/User.php';


    $database = new Database();
    $db = $database->getConnection();
    $users = new User($db);
     $data = json_decode(file_get_contents("php://input"));

    if($data->email && $data->password) {

        $data = $users->login($data->email, md5($data->password));

        if(!empty($data)) {

            echo json_encode(['data' => $data, 'status' => 200, 'message' => 'success']);

        } else {

            echo json_encode(['data' => null, 'status' => 403, 'message' => 'error']);

        }


    }

} else {
        http_response_code(403);
}





?>
