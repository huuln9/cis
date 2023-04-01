<?php
class MvTagModel extends Database {
    public function GetAll() {
        $qr = "SELECT * FROM `mv_tag`;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function GetByTag($tagId) {
        $qr = "SELECT * FROM `mv_tag` WHERE `tagId`=$tagId;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function Add($mvId, $tagId) {
        $qr = "INSERT INTO `mv_tag` VALUES (null, '$mvId', '$tagId');";
        $this->conn->query($qr);
    }

    public function DeleteByMv($id) {
        $qr = "DELETE FROM `mv_tag` WHERE mvId=$id;";
        $this->conn->query($qr);
    }

    public function DeleteByTag($id) {
        $qr = "DELETE FROM `mv_tag` WHERE tagId=$id;";
        $this->conn->query($qr);
    }
}
?>