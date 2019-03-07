<?php
class Notifications
{
  private $conn;

  public $id, $productid;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function checkproductquantity($productid)
  {
        $query = "SELECT * FROM products WHERE id = $productid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_OBJ);

        $x = 0;
        $data = [];

        foreach ($products as $value) {

           $data[$x++] = [
                'id' => $value->id,
                'quantity' => $value->quantity,
                'reordering_point' => $value->reordering_point,
                'name' => $value->name
           ];

        }

        if($data['reordering_point'] <= $data['quantity']) {

        $query = "INSERT INTO notification
                        (user_id, description)
                VALUES
                        (:userid, :description) ";

            $stmt = $this->conn->prepare($query);

            $productname = $data['name'];
            $code = $data['code'];
            $stmt->bindParam(":userid", $_SESSION['user_id']);
            $stmt->bindParam(":description", "Product $code : $productname reached reordering point.");

            if($stmt->execute()){

                return true;

            } else {

                return false;

            }

        } else {

        }



        return $category;
  }

  public function getusernotif()
  {
     if( $_SESSION['user_id'] ) {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM notification WHERE user_id = $id ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $notif = $stmt->fetchAll(PDO::FETCH_OBJ);

        $i=0;
        $data = [];

        foreach ($notif as $value) {
           $data[$i++] = [
              'id' => $value->id,
              'user_id' => $value->user_id,
              'description' =>   $value->description,
              'date' => $value->date,
          ];
        }

        return $data;
     }
  }






}

?>
