<?php
class TagModel extends Database {
    public function GetAll() {
        $qr = "SELECT * FROM `tag`;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function GetOne($id) {
        $qr = "SELECT * FROM `tag` WHERE `id`=$id;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function Add($name) {
        $qr = "INSERT INTO `tag` VALUES (null, '$name');";
        $this->conn->query($qr);
    }

    public function Edit($id, $name) {
        $qr = "UPDATE `tag` SET `name`='$name' WHERE `id`=$id;";
        $this->conn->query($qr);
    }

    public function Delete($id) {
        $qr = "DELETE FROM `tag` WHERE id=$id;";
        $this->conn->query($qr);
    }
}
?>