    <?php
class Delivery {

    private $db;

    public $id, $trackingNumber, $orderId, $description, $status, $courierid;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getDelivery($id) {

        $query = "SELECT d.id as delivery_id, d.delivery_date, d.tracking_number, o.order_number, d.description, d.status, c.name as courier, o.total_amount, o.date, u.name as customer FROM delivery d LEFT JOIN courier c ON c.id = d.courier_id LEFT JOIN orders o ON d.order_id = o.id LEFT JOIN users u ON o.user_id = u.id WHERE o.supplier_id = $id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        $i = 0;
        $data = [];

        foreach ($res as $value) {
            $data[$i++] = [
                    'delivery_id' => $value->delivery_id,
                    'tracking_number' => $value->tracking_number,
                    'order_number' =>   $value->order_number,
                    'order_date' => $value->date,
                    'customer' => $value->customer,
                    'status' => $value->status,
                    'courier' => $value->courier,
                    'total_amount' => $value->total_amount,
                    'description' => $value->description,
                    'delivery_date' => $value->delivery_date
            ];

        }

        return $data;

    }


    public function addDelivery($orderDetailsId)
    {
        $query = "INSERT INTO cart (tracking_number, order_id, description, status, courier_id) VALUES (:trackingnumber, :orderid, :description, 'ongoing', :courierid) ";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":trackingnumber", $this->trackingNumber);
        $stmt->bindParam(":orderid", $this->orderId);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":courierid", $this->courierid);

        if( $stmt->execute() ){

            return true;

        }
        return false;
    }




}

?>
