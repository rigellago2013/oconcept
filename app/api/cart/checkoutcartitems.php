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
        include_once '../../models/Orders.php';


        $database = new Database();
        $db = $database->getConnection();
        $cart = new Cart($db);
        $product = new Product($db);
        $order = new Order($db);
        $notifications = new Notifications($db);


        $data = $cart->getCartItems($_SESSION['user_id']);

        $orderId = $order->generateOrder();

        $totalcost = 0;

        foreach ($data as $value) {

            $totalcost = $value['quantity'] * $value['unit_cost'];

            //place orderdetails
            $order->placeOrderDetails($orderId, $value['product_id'], $value['unit_cost'], $value['quantity'], $totalcost );

            //remove row from cart
            $cart->deleteCartRow($value['id']);

            //deduct product from inventory
            $product->deductProduct($value['product_id'], $value['quantity']);

        }

        //sum order details
        $total = $order->sumOrderDetails($orderId);

        //update total amount
        $res = $order->updateTotalAmount($orderId, $total);


        if($res) {

            http_response_code(200);
            echo json_encode(['status' => 200, 'message' => 'Items successfully checked out.']);

        } else {

                http_response_code(403);
            echo json_encode(['status' => 200, 'message' => 'Error!']);

        }








     }

?>
