<?php
class AdvModel extends Database {
    public function GetAll() {
        $qr = "SELECT * FROM `adv` ORDER BY `name` ASC;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function GetPart($limit, $offset) {
        $qr = "SELECT * FROM `adv` ORDER BY `name` ASC LIMIT $limit OFFSET $offset;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function GetOne($id) {
        $qr = "SELECT * FROM `adv` WHERE `id`=$id;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function Add($name) {
        $qr = "INSERT INTO `adv` VALUES (null, '$name');";
        $this->conn->query($qr);
    }

    public function Edit($id, $name) {
        $qr = "UPDATE `adv` SET `name`='$name' WHERE `id`=$id;";
        $this->conn->query($qr);
    }

    public function Delete($id) {
        $qr = "DELETE FROM `adv` WHERE id=$id;";
        $this->conn->query($qr);
    }
}
?>