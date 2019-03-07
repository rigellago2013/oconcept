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
    $user = new User($db);
    $data = json_decode(file_get_contents("php://input"));

    if($data->type == 2) {

        $res = $user->customerRegister($data->name, $data->address, $data->contact, $data->email, $data->password);

    } else if ($data->type == 3) {
            $res = $user->sellerRegister($data->name, $data->address, $data->contact, $data->email, $data->password);
    }


    if($res) {

        $data = [
            'name' => $data->name,
            'email' => $data->email
        ];
        http_response_code(200);
        echo json_encode(['data' => $data, 'status' => 200, 'message' => 'User successfully registered!']);

    } else {

        http_response_code(403);
        echo json_encode(['status' => 403, 'message' => 'bad request']);

    }


} else {
    http_response_code(503);
}




?>
