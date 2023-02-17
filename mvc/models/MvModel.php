<?php
class MvModel extends Database {
    function GetAll() {
        $qr = "SELECT * FROM `mv`;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function GetOne($id) {
        $qr = "SELECT * FROM `mv` WHERE `id`=$id;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    function GetLastId() {
        $qr = "SELECT MAX(id) FROM `mv`;";
        $rs = $this->conn->query($qr);

        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    function Add($code, $thumbnail, $links) {
        $qr = "INSERT INTO `mv` VALUES (null, '$code', '$thumbnail', '$links');";
        $this->conn->query($qr);
    }

    public function Edit($id, $code, $thumbnail, $links) {
        $qr = "UPDATE `mv` SET `code`='$code', `thumbnail`='$thumbnail', `links`='$links' WHERE `id`=$id;";
        $this->conn->query($qr);
    }

    public function EditNotAvt($id, $code, $links) {
        $qr = "UPDATE `mv` SET `code`='$code', `links`='$links' WHERE `id`=$id;";
        $this->conn->query($qr);
    }

    public function Delete($id) {
        $qr = "DELETE FROM `mv` WHERE id=$id;";
        $this->conn->query($qr);
    }
}
?>