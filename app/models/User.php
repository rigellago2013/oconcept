<?php

class User {

    protected $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }


    public function All() {

        $query = "SELECT u.id as user_id, name, email, contact, address, t.description FROM users u LEFT JOIN types t ON u.type_id = t.id WHERE t.description <> 'Admin' ";

        $query = $this->connection->prepare($query);

        $query->execute();

        $users = $query->fetchAll(PDO::FETCH_OBJ);

        $i=0;
        $data = [];

            foreach ($users as $value) {
                $data[$i++] = [
                    'id' => $value->user_id,
                    'name' => $value->name,
                    'email' =>   $value->email,
                    'contact' => $value->contact,
                    'address' => $value->address,
                    'type' => $value->description
                ];
            }

            return $data;

    }

    public function login($email, $password) {

        $q = $this->connection->prepare('SELECT u.id, u.email, u.name, t.description, u.address FROM users u LEFT JOIN types t ON u.type_id = t.id WHERE email = ? AND password = ? ');

        $q->execute([$email,$password]);

        $count = $q->rowCount();


        if ($count == 0) {

            return false;

        } else {

          $data = $q->fetch(PDO::FETCH_OBJ);

          $_SESSION['login'] = true;

          $res = [
                'email' => $_SESSION['email'] = $data->email,
                'name' =>  $_SESSION['name'] = $data->name,
                'user_type' =>  $_SESSION['user_type'] = $data->description,
                'user_id' => $_SESSION['user_id'] = $data->id,
                'address' => $_SESSION['address'] = $data->address
          ];

          return $res;

        }

    }


    public function getuser($id)
    {

        $q = $this->connection->prepare('SELECT * FROM users WHERE id = ?');

        $q->execute([$id]);

        $count = $q->rowCount();


        if($count == 0) {

            return false;

        } else {


          return $data = $q->fetchAll(PDO::FETCH_OBJ);

        }

    }


    public function adminlogin($email, $password) {

        $q = $this->connection->prepare('SELECT * FROM users WHERE email = ? AND password = ?');

        $q->execute([$email,$password]);

        $count = $q->rowCount();


        if($count == 0) {

            return false;

        } else {


          $data = $q->fetch(PDO::FETCH_OBJ);
          $_SESSION['login'] = true;
          $_SESSION['is_admin'] = 1;

          return true;

        }

    }


    public function customerRegister($name,$address, $contact, $email,$password, $type = '2') {

        $stmt = $this->connection->prepare( "SELECT * FROM users WHERE email = ?" );

        $stmt->execute([$email]);

        $res = $stmt->fetch();

        if( !$res ) {

            $data = [

                    'name' => $name,

                    'address' => $address,

                    'contact' => $contact,

                    'email' => $email,

                    'password' => md5($password),

                    'type_id' => $type

                ];


            $sql = "INSERT INTO users (name, address, contact, email, password, type_id) VALUES (:name, :address, :contact, :email, :password, :type_id)";

            $stmt= $this->connection->prepare($sql);

            $res = $stmt->execute($data);


            if ($res) {


               $website = 'https://o-concept.com/modules/client/verify/verify.php?email='.$email;

               $subject = "Email verification from O-Concept";

                $body =
                "<html>
                <head>
                <title>O-Concept</title>
                </head>
                <body>
                <p>NOTICE: This email transmitted to ".$email." are confidential and intended for the sole use of the person to whom they are addressed.  If you are not the intended recipient you have received this email in error.
                Any use, dissemination, forwarding, printing, copying or dealing in any way whatsoever with this email is strictly prohibited.  If you have received this email in error, please advise the sender immediately.</p>
                <table>
                <tr>
                <th>
                     <a href='".$website."'/> Click here to verify ".$email." </a>
                </th>
                </tr>
                </table>
                </body>
                </html>";


                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <treatout.com>' . "\r\n";

                if ( mail($email,$subject,$body,$headers) ) {

                    return true;

                }
                    return false;

            }
                return false;


        } else  {


           return false;

        }

    }

    public function sellerRegister($name,$address, $contact, $email,$password, $type = '3') {

        $stmt = $this->connection->prepare( "SELECT * FROM users WHERE email = ?" );

        $stmt->execute([$email]);

        $res = $stmt->fetch();

        if( !$res ) {

            $data = [

                    'name' => $name,

                    'address' => $address,

                    'contact' => $contact,

                    'email' => $email,

                    'password' => md5($password),

                    'type_id' => $type

                ];


            $sql = "INSERT INTO users (name, address, contact, email, password, type_id) VALUES (:name, :address, :contact, :email, :password, :type_id)";

            $stmt= $this->connection->prepare($sql);

            $res = $stmt->execute($data);


            if ($res) {


               $website = 'https://o-concept.com/modules/client/verify/verify.php?email='.$email;

               $subject = "Email verification from O-Concept";

                $body =
                "<html>
                <head>
                <title>O-Concept</title>
                </head>
                <body>
                <p>NOTICE: This email transmitted to ".$email." are confidential and intended for the sole use of the person to whom they are addressed.  If you are not the intended recipient you have received this email in error.
                Any use, dissemination, forwarding, printing, copying or dealing in any way whatsoever with this email is strictly prohibited.  If you have received this email in error, please advise the sender immediately.</p>
                <table>
                <tr>
                <th>
                     <a href='".$website."'/> Click here to verify ".$email." </a>
                </th>
                </tr>
                </table>
                </body>
                </html>";


                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <treatout.com>' . "\r\n";

                if ( mail($email,$subject,$body,$headers) ) {

                    return true;

                }
                    return false;

            }
                return false;


        } else  {


           return false;

        }

    }


    public function getTypes()
    {
        $query = "SELECT * FROM types WHERE description <> 'Admin' ";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        $data = [];
        $i = 0;
        foreach ($res as $value) {

            $data[$i++] = [
                    'id' => $value->id,
                    'description' => $value->description
            ];
        }

        return $data;

    }



}
