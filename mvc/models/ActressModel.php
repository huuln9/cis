<?php
class ActressModel extends Database {
    public function GetAll() {
        $qr = "SELECT * FROM `actress` ORDER BY `name` ASC;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function GetPart($limit, $offset) {
        $qr = "SELECT * FROM `actress` ORDER BY `name` ASC LIMIT $limit OFFSET $offset;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function GetByName($name) {
        $qr = "SELECT * FROM `actress` WHERE `name` LIKE '%$name%' ORDER BY `name` ASC;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function GetOne($id) {
        $qr = "SELECT * FROM `actress` WHERE `id`=$id;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    function GetLastId() {
        $qr = "SELECT MAX(id) FROM `actress`;";
        $rs = $this->conn->query($qr);

        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function Add($name, $otherNames, $avatar) {
        $qr = "INSERT INTO `actress` VALUES (null, '$name', '$otherNames', '$avatar');";
        $this->conn->query($qr);
    }

    public function Edit($id, $name, $otherNames, $avatar) {
        $qr = "UPDATE `actress` SET `name`='$name', `otherNames`='$otherNames', `avatar`='$avatar' WHERE `id`=$id;";
        $this->conn->query($qr);
    }

    public function EditNotAvt($id, $name, $otherNames) {
        $qr = "UPDATE `actress` SET `name`='$name', `otherNames`='$otherNames' WHERE `id`=$id;";
        $this->conn->query($qr);
    }

    public function Delete($id) {
        $qr = "DELETE FROM `actress` WHERE id=$id;";
        $this->conn->query($qr);
    }
}
?>