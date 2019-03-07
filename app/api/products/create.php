<?php
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once '../../../library/database.php';
        include_once '../../models/Products.php';

        $database = new Database();
        $db = $database->getConnection();
        $product = new Product($db);
        $data = json_decode(file_get_contents("php://input"));

        if(
            !empty($data->name) &&
            !empty($data->category_id) &&
            !empty($data->cost) &&
            !empty($data->quantity) &&
            !empty($data->reordering_point) &&
            !empty($data->user_id) &&
            !empty($data->description)
        ){

           $code = rand ( 1000000 , 9999999 );
           $path = "../../../app/images/".$code.".jpeg";
           $img = explode(',', $data->image);
           $imgfile = base64_decode($img[1]);
           $imagepath = file_put_contents($path, $imgfile);


            $product->name = $data->name;
            $product->description = $data->description;
            $product->category_id = $data->category_id;
            $product->cost = $data->cost;
            $product->quantity = $data->quantity;
            $product->reordering_point = $data->reordering_point;
            $product->image = $path;
            $product->code = $code;
            $product->supplier_id  = $data->user_id;

            if( $product->create() ) {

                http_response_code(200);
                echo json_encode(array("message" => "Product was created.", "status" => 200));

            } else{

                http_response_code(403);
                echo json_encode(array("message" => "Unable to create product.", "status" => 503));

            }
        } else{

            http_response_code(503);
            echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
        }





?>
