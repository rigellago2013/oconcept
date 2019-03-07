<?php
class Payment{

    private $conn;

    public $id, $name, $description, $category_id, $cost, $quantity, $reordering_point, $supplier_id, $date_added, $image ,$code;

    public function __construct($db){
        $this->conn = $db;
    }

    public function getpaymentforseller($id)
    {
        $query = "SELECT o.id as order_id, o.order_number, p.amount as amount_paid, p.payment_date, u.name, p.id as payment_id FROM payments p LEFT JOIN orders o ON p.order_id = o.id LEFT JOIN users u ON p.customer_id = u.id WHERE p.supplier_id = $id";


        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $products = $stmt->fetchAll(PDO::FETCH_OBJ);

        if(!empty($products)) {
            $i=0;
            $data = [];

            foreach ($products as $value) {
                $data[$i++] = [
                   'order_id' => $value->order_id,
                   'order_number' =>$value->order_number,
                   'amount_paid' => $value->amount_paid,
                   'payment_date' => $value->payment_date,
                   'customer' => $value->name,
                   'payment_id' => $value->payment_id,
                ];
            }

            return $data;

        } else {

            return null;

        }


    }



}
