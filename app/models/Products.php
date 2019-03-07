<?php
class Product{

    private $conn;

    public $id, $name, $description, $category_id, $cost, $quantity, $reordering_point, $supplier_id, $date_added, $image ,$code;

    public function __construct($db){
        $this->conn = $db;
    }

    public function read()
    {
            $query = "SELECT p.image, p.id as product_id, p.name, p.description, p.cost, p.quantity, c.description as category, u.name as supplier FROM products p LEFT JOIN category c ON (c.id = p.category_id) LEFT JOIN users u ON (u.id = p.supplier_id) ORDER BY RAND() LIMIT 30";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            $products = $stmt->fetchAll(PDO::FETCH_OBJ);

            $i=0;
            $data = [];

            foreach ($products as $value) {
                $data[$i++] = [
                    'id' => $value->product_id,
                    'name' => $value->name,
                    'unit_cost' =>   $value->cost,
                    'quantity' => $value->quantity,
                    'category' => $value->category,
                    'rating' => rand(1,5),
                    'supplier' => $value->supplier,
                    'image' => $value->image
                ];
            }

            return $data;

    }


    public function getSellerProducts($id)
    {
            $query = "SELECT p.reordering_point, p.date_added, p.image, p.id as product_id, p.code, p.name, p.description, p.cost, p.quantity, c.description as category FROM products p LEFT JOIN category c ON (c.id = p.category_id) LEFT JOIN users u ON (u.id = p.supplier_id) WHERE p.supplier_id = $id ORDER BY p.date_added";


            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_OBJ);

            $i=0;
            $data = [];

            foreach ($products as $value) {
                $data[$i++] = [
                    'id' => $value->product_id,
                    'name' => $value->name,
                    'code' => $value->code,
                    'unit_cost' =>   $value->cost,
                    'quantity' => $value->quantity,
                    'reordering_point' => $value->reordering_point,
                    'category' => $value->category,
                    'image' => $value->image,
                    'date_added' => $value->date_added
                ];
            }

            return $data;
    }

    public function create() {

            $query = "INSERT INTO products
                        (name, description, category_id, quantity, reordering_point, date_added, cost, supplier_id, image, code)
                    VALUES
                        (:name, :description, :categoryid, :quantity, :reordering_point, NOW(), :cost, :supplier_id, :image, :code) ";

            $stmt = $this->conn->prepare($query);

            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->category_id=htmlspecialchars(strip_tags($this->category_id));
            $this->quantity=htmlspecialchars(strip_tags($this->quantity));
            $this->reordering_point=htmlspecialchars(strip_tags($this->reordering_point));
            $this->cost=htmlspecialchars(strip_tags($this->cost));
            $this->supplier_id=htmlspecialchars(strip_tags($this->supplier_id));
            $this->code=htmlspecialchars(strip_tags($this->code));
            //$this->image=htmlspecialchars(strip_tags($this->image));

            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":categoryid", $this->category_id);
            $stmt->bindParam(":quantity", $this->quantity);
            $stmt->bindParam(":reordering_point", $this->reordering_point);
            $stmt->bindParam(":cost", $this->cost);
            $stmt->bindParam(":supplier_id", $this->supplier_id);
            $stmt->bindParam(":image", $this->image);
            $stmt->bindParam(":code", $this->code);

            if($stmt->execute()){

                return true;

            } else {

                return false;

            }



    }

    public function get() {

        $query = "SELECT p.id as product_id, p.reordering_point, p.name, p.description, p.cost, p.quantity, p.date_added, c.description as category , u.name as supplier, p.image FROM products p LEFT JOIN category c ON (c.id = p.category_id) LEFT JOIN users u ON (u.id = p.supplier_id) WHERE p.id = ?";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->cost = $row['cost'];
        $this->type_id = $row['description'];
        $this->quantity = $row['quantity'];
        $this->reordering_point = $row['reordering_point'];
        $this->date_added = $row['date_added'];
        $this->supplier_id = $row['supplier'];
        $this->image = $row['image'];

    }

    public function update() {

        if(!empty($_SESSION['user_id'])) {

                    $query = "UPDATE
                        products
                    SET
                        name = :name,
                        description = :description,
                        type_id = :type_id,
                        cost = :cost,
                        quantity = quantity + :quantity,
                        reordering_point = :reordering_point
                    WHERE
                        id = :id";

            $stmt = $this->conn->prepare($query);

            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->type_id=htmlspecialchars(strip_tags($this->type_id));
            $this->cost=htmlspecialchars(strip_tags($this->cost));
            $this->quantity=htmlspecialchars(strip_tags($this->quantity));
            $this->reordering_point=htmlspecialchars(strip_tags($this->reordering_point));
            $this->id=htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':type_id', $this->type_id);
            $stmt->bindParam(':cost', $this->cost);
            $stmt->bindParam(':quantity', $this->quantity);
            $stmt->bindParam(':reordering_point', $this->reordering_point);
            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()){
                return true;
            }

            return false;
        }
            return false;

    }

    // delete the product
    public function delete() {

        // delete query
        $query = "DELETE FROM products WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;

}

    public function deductProduct($id, $quantity) {
            $query = "UPDATE products SET quantity = quantity - $quantity
                    WHERE
                        id = $id ";

            $stmt = $this->conn->prepare($query);

            if( $stmt->execute() ) {
                return true;
            }

            return false;
    }


    public function getOrderedProducts($id)
    {
        $query = "SELECT od.product_id, od.quantity, od.total_cost, p.name, p.code, o.date, o.order_number FROM orders o LEFT JOIN order_details od ON od.order_id = o.id LEFT JOIN products p ON p.id = od.product_id WHERE p.supplier_id = $id ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_OBJ);

        $data = [];
        $i = 0;

        foreach ($products as $value) {
            $data[$i++] = [
                'order_number' => $value->order_number,
                'product_id' => $value->product_id,
                'product_code' => $value->code,
                'name' => $value->name,
                'quantity' => $value->quantity,
                'total_cost' => $value->total_cost,
                'order_date' => $value->date
            ];
        }

        return $data;

    }

    public function getcategory()
    {
        $query = "SELECT * FROM category";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_OBJ);

        $x = 0;
        $category = [];

        foreach ($products as $value) {

           $category[$x++] = [
                'id' => $value->id,
                'description' => $value->description
           ];

        }

        return $category;
    }

    public function getproductsforhome()
    {
            $query = "SELECT p.image, p.id as product_id, p.name, p.description, p.cost, p.quantity, c.description as category, u.name as supplier FROM products p LEFT JOIN category c ON (c.id = p.category_id) LEFT JOIN users u ON (u.id = p.supplier_id) ORDER BY RAND() LIMIT 4";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_OBJ);

            $i=0;
            $data = [];

            foreach ($products as $value) {
                $data[$i++] = [
                    'id' => $value->product_id,
                    'name' => $value->name,
                    'unit_cost' =>   $value->cost,
                    'quantity' => $value->quantity,
                    'category' => $value->category,
                    'rating' => rand(1,5),
                    'supplier' => $value->supplier,
                    'image' => $value->image
                ];
            }

            return $data;
    }





}
