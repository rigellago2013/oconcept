<?php
class Messaging {

    private $conn;

    public $id, $customerId, $sellerId, $body, $time, $date;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function insertMessage()
    {
        if($_SESSION['user_type'] == 'Customer') {

            $query = "INSERT INTO messaging (customer_id, seller_id, body, date_time) VALUES(:customerid, :supplierid, :body, NOW()) ";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":customerid", $_SESSION['user_id']);
            $stmt->bindParam(":supplierid", $this->sellerId);
            $stmt->bindParam(":body", $this->body);

            if( $stmt->execute() ) {

                return true;

            } else {

                return false;

            }

        } else {

            $query = "INSERT INTO messaging (seller_id, customer_id, body, date_time ) VALUES ( :supplierid, :supplierid, :body, NOW() ) ";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":supplierid", $_SESSION['user_id']);
            $stmt->bindParam(":customerid", $this->customerId);
            $stmt->bindParam(":body", $this->body);
            if( $stmt->execute() ) {

                return true;

            } else {

                return false;

            }

        }
    }

    public function getMessagesForSeller($id)
    {
            $query = "SELECT u.name, m.body, m.date_time FROM messaging m LEFT JOIN users u ON m.customer_id = u.id  WHERE m.customer_id = :id ORDER BY date_time DESC ";

            $stmt->bindParam(":id", $id);
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_OBJ);

            $data = [];
            $i = 0;

            foreach ($products as $value) {
                $data[$i++] = [
                    'user' => $value->name,
                    'body' => $value->body,
                    'date' => $value->date_time,
                ];
            }

            return $data;

    }

            //     $query = "SELECT u.name, m.body, m.date_time FROM messaging m LEFT JOIN users u ON m.customer_id = u.id  WHERE m.customer_id = :id ";

            // $stmt = $this->conn->prepare($query);
            // $stmt->bindParam(":id", $_SESSION['user_id']);
            // $stmt->execute();
            // $msg = $stmt->fetchAll(PDO::FETCH_OBJ);

            // $data = [];
            // $i = 0;

            // foreach ($msg as $value) {
            //     $data[$i++] = [
            //         'user' => $value->name,
            //         'body' => $value->body,
            //         'date' => $value->date_time,
            //     ];
            // }

            // return $data;



}


?>
