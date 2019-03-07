<?php
     if( $_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'post' ) {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once '../../../library/database.php';
        include_once '../../models/Cart.php';
        include_once '../../models/Products.php';

        $database = new Database();
        $db = $database->getConnection();
        $cart = new Cart($db);
        $product = new Product($db);
        $data = json_decode(file_get_contents("php://input"));

        if(
            !empty($data->product_id) &&
            !empty($data->quantity) &&
            !empty($data->unit_cost)
        ){

            $cart->product_id = $data->product_id;
            $cart->quantity = $data->quantity;
            $cart->unitcost = $data->unit_cost;

            if ( $cart->addToCart() ) {

                http_response_code(200);
                echo json_encode(array("message" => "Product successfully added to cart.", "status" => 200));

            } else {

                http_response_code(503);
                echo json_encode(array("message" => "Unable to create product.", "status" => 503));

            }


        } else {

            http_response_code(400);
            echo json_encode(array("message" => "Unable to create product. Data is incomplete."));

        }

    } else {

         http_response_code(403);

    }

?>
