<?php
class Cart {

    private $conn;

    public $id, $product_id, $userid, $quantity, $unitcost;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addToCart()
    {
        $query = "INSERT INTO cart (product_id, user_id, unit_cost, quantity) VALUES (:product_id, :user_id, :unitcost, :quantity) ";
        $stmt = $this->conn->prepare($query);

        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));

        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->bindParam(":user_id", $_SESSION['user_id']);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":unitcost", $this->unitcost);

        if( $stmt->execute() ){

            return true;

        }
        return false;

    }

    public function getCartItems($user_id)
    {
            $query = "SELECT c.id, p.code, c.product_id, p.name, p.image, p.description, p.cost, c.quantity, c.user_id FROM cart c LEFT JOIN products p ON c.product_id = p.id WHERE c.user_id = $user_id ";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_OBJ);

            $i=0;
            $data = [];

            foreach ($products as $value) {
                $data[$i++] = [
                    'id' => $value->id,
                    'product_id' => $value->product_id,
                    'code' => $value->code,
                    'image' => $value->image,
                    'name' =>   $value->name,
                    'unit_cost' => $value->cost,
                    'quantity' => $value->quantity,
                    'user_id' => $value->user_id
                ];
            }

            return $data;

    }

    public function deductCartItems()
    {
        $query = "UPDATE cart SET quantity = quantity - :quantity WHERE product_id = :id AND user_id = :userid ";
        $stmt = $this->conn->prepare($query);

        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        $this->product_id=htmlspecialchars(strip_tags($this->product_id));
        $this->userid = htmlspecialchars(strip_tags($this->userid));

        $stmt->bindParam(':quantity', $this->name);
        $stmt->bindParam(':product_id', $this->description);
        $stmt->bindParam(':userid', $this->userid);

        if( $stmt->execute() ) {
            return true;
        }
        return false;

    }

    public function removecartitem($cartid, $productid, $quantity)
    {
        try {

            $query = "DELETE FROM cart WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($cartid));
            $stmt->bindParam(":id", $cartid);
            $stmt->execute();

            $queryTwo = "UPDATE products SET quantity = quantity + :quantity WHERE id = :id";
            $stmtTwo = $this->conn->prepare($queryTwo);
            $stmtTwo->bindParam(":quantity", $quantity);
            $stmtTwo->bindParam(":id", $productid);
            $stmtTwo->execute();

            return true;

        } catch (exception $e){

            return false;

        }

    }


    public function deleteCartRow($id)
    {
        $query = "DELETE FROM cart WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }




}
?>
