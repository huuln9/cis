<?php
class ActressModel extends Database {
    public function GetAll() {
        $qr = 'SELECT * FROM `actress`;';
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    function Add($name, $avatar) {
        $qr = "INSERT INTO `actress` VALUES (null, '$name', '$avatar');";
        $this->conn->query($qr);
    }

    public function UpdateAccount($id, $fullname, $email, $password, $admin, $phone, $address) {
        $qr = "UPDATE `account` SET `fullname`='$fullname',`email`='$email',`password`='$password',`admin`=$admin,`phone`='$phone',`address`='$address' WHERE `id`=$id;";
        $this->conn->query($qr);
    }

    public function DeleteAccount($id) {
        $qr = 'DELETE FROM `account` WHERE id=$id;';
        $this->conn->query($qr);
    }
}
?>