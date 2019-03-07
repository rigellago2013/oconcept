<?php
class Order {

    private $conn;

    public $id, $user_id, $total_amount,$date, $ordernumber, $status;

    public function __construct($db) {

        $this->conn = $db;
    }

    public function getOrder($id) {

        $query = "SELECT id as order_id, order_number, total_amount, date FROM orders WHERE user_id = $id ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        $i=0;
        $x = 0;
        $order = [];

        foreach ($res as $value) {

            $order[$x++] = [
                'order_id' => $value->order_id,
                'order_num' => $value->order_number,
                'total_amount' => $value->total_amount,
                'order_date' =>   $value->date,
            ];

        }

        return $order;
    }

     public function getAllOrder($id) {

            $query = "SELECT o.id as order_id, order_number, total_amount, date, od.id as detail_id, product_id, unit_cost, od.quantity, total_cost, p.image, p.name, p.description FROM orders o LEFT JOIN order_details od ON o.id = od.order_id LEFT JOIN products p ON od.product_id = p.id WHERE o.user_id = $id ";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);

            $i=0;
            $x = 0;
            $order = [];
            $order_details = [];

            foreach ($res as $value) {

                $order = [
                    'order_id' => $value->order_id,
                    'order_num' => $value->order_number,
                    'total_amount' => $value->total_amount,
                    'order_date' =>   $value->date,
                ];

                $order_details[$i++] = [
                    'detail_id' => $value->detail_id,
                    'product_id' => $value->product_id,
                    'unit_cost' => $value->unit_cost,
                    'quantity' => $value->quantity,
                    'total_cost' => $value->total_cost,
                    'product_name' => $value->name,
                    'product_description' => $value->description,
                    'image' => $value->image
                ];

            }

            $data = [
                'order' => $order,
                'order_details' => $order_details,
            ];

            return $data;
    }


    public function generateOrder() {

        $number = mt_rand( 10000000, 99999999);

        $query = "INSERT INTO orders (user_id, date, status, order_number) VALUES (:userid, NOW(), :status, :ordernumber)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":userid", $_SESSION['user_id']);
        $stmt->bindParam(":status", $this->quantity);
        $stmt->bindParam(":ordernumber", $number);

        if($stmt->execute()){

             return $id = $this->conn->lastInsertId();

        }
        return false;
    }


    public function placeOrderDetails($orderid, $productid, $unitcost, $quantity, $totalcost)
    {
        $query = "INSERT INTO order_details (product_id, unit_cost, quantity, order_id, total_cost) VALUES(:productid, :unitcost, :quantity, :orderid, :totalcost) ";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":productid", $productid);
        $stmt->bindParam(":unitcost", $unitcost);
        $stmt->bindParam(":quantity", $quantity);
        $stmt->bindParam(":orderid", $orderid);
        $stmt->bindParam(":totalcost", $totalcost);
        $stmt->execute();
    }

    public function sumOrderDetails($orderId)
    {
        $query = $this->conn->query("SELECT SUM(total_cost) as total_amount FROM order_details WHERE order_id = $orderId ");
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $totalcost = $row['total_amount'] + 150; //150 for delivery charge

    }

    public function updateTotalAmount($orderid, $totalamount)
    {
        $query = "UPDATE
                        orders
                    SET
                        total_amount = :totalamount
                    WHERE
                        id = $orderid ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':totalamount', $totalamount);

        if( $stmt->execute() ) {

            return true;

        }
            return false;


    }

    public function getOrderDetails($id)
    {
        $query = "SELECT o.order_number, od.id as odetails_id, od.product_id, od.unit_cost, od.quantity, od.total_cost, p.name, p.description, p.image, o.date FROM order_details od LEFT JOIN products p ON od.product_id = p.id LEFT JOIN orders o ON od.order_id = o.id WHERE od.order_id = $id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        $x = 0;
        $order = [];

        foreach ($res as $value) {

            $order[$x++] = [
                'odetails_id' => $value->odetails_id,
                'product_id' => $value->product_id,
                'unit_cost' => $value->unit_cost,
                'quantity' =>   $value->quantity,
                'total_cost' => $value->total_cost,
                'product_name' => $value->name,
                'description' => $value->description,
                'product_image' => $value->image,
                'order_num' => $value->order_number,
                'order_date' => $value->date
            ];

        }

        return $order;
    }

}
?>
