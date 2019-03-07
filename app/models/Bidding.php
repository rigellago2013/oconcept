<?php
class Bidding {

    private $conn;

    public $id, $biddingid, $user_id, $startingamount,$date, $status, $description;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function postBid()
    {
            $query = "INSERT INTO bidding
                        (description, user_id, date, title)
                      VALUES
                        (:description, :userid, NOW(), :title) ";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":userid",$this->user_id);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":title", $this->title);

            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
    }

    public function postComment()
    {
        $query = "INSERT INTO seller_bid
                        (bidding_id, amount, user_id, date)
                  VALUES
                        (:biddingid, :amount, :userid, NOW()) ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":biddingid", $this->biddingid);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":userid", $this->user_id);

        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function closeBid($id, $commentid)
    {
            $query = "UPDATE
                        bidding
                    SET
                        status = 'close'
                    WHERE
                        id = $id";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            $queryTwo = "UPDATE seller_bid SET status = 'approved' WHERE id = $commentid";
            $stmtTwo = $this->conn->prepare($queryTwo);
            $stmtTwo->execute();

            $queryThree = "UPDATE seller_bid SET status = 'close' WHERE bidding_id = $id AND id <> $commentid";
            $stmtThree = $this->conn->prepare($queryThree);

            //create order


            if( $stmtThree->execute() ) {

                return true;

            } else {
                return false;
            }

    }


    public function getCustomerBids($id)
    {
        $query = "SELECT * FROM bidding WHERE user_id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $bids = $stmt->fetchAll(PDO::FETCH_OBJ);

        $i=0;
        $data = [];

        foreach ($bids as $value) {
            $data[$i++] = [
                'id' => $value->id,
                'user_id' => $value->user_id,
                'description' => $value->description,
                'date' => $value->date,
                'status' => $value->status,
                'title' => $value->title
            ];
        }

        return $data;

    }


    public function getBidWithComments($id)
    {
        $query = "SELECT b.id as bid_id, description, b.date as bid_date, sb.status, sb.id as comment_id, amount, sb.date as comment_date, s.name as seller_name   FROM bidding b LEFT JOIN seller_bid sb ON b.id = sb.bidding_id LEFT JOIN users u ON b.user_id = u.id LEFT JOIN users s ON s.id = sb.user_id WHERE b.id = $id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

            $i=0;
            $x = 0;
            $bid = [];
            $comments = [];

            foreach ($res as $value) {

                $bid = [
                    'bid_id' => $value->bid_id,
                    'description' => $value->description,
                    'bid_date' => $value->bid_date,
                ];

                $comments[$i++] = [
                    'comment_id' => $value->comment_id,
                    'amount' => $value->amount,
                    'comment_date' => $value->comment_date,
                    'seller' => $value->seller_name,
                    'status' => $value->status
                ];

            }

            $data = [
                'bid' => $bid,
                'comment' => $comments,
            ];

            return $data;
    }


    public function getbidsforseller()
    {
        $query = "SELECT b.id, b.description, b.title, b.date, u.name FROM bidding b LEFT JOIN users u ON b.user_id = u.id WHERE status <> 'closed'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        $i=0;
        $x = 0;
        $bid = [];
        $comments = [];

        foreach ($res as $value) {

                $bid[$x++] = [
                    'bid_id' => $value->id,
                    'title' => $value->title,
                    'description' => $value->description,
                    'bid_date' => $value->date,
                    'customer' => $value->name
                ];

            }

            return $bid;
    }


    public function getComments($bidId)
    {
        $query = "SELECT u.name, sb.amount, sb.date FROM seller_bid sb LEFT JOIN users u ON sb.user_id = u.id WHERE bidding_id = $bidId";

            $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        $i=0;
        $x = 0;
        $bid = [];

        if(!empty($res)) {
            foreach ($res as $value) {

                $bid[$x++] = [
                    'seller' => $value->name,
                    'amount' => $value->amount,
                    'date' => $value->date,
                ];

            }

            return $bid;
        } else {
            return null;
        }
    }



}

?>
