<?php
class ActressAdvModel extends Database {
    public function GetAll() {
        $qr = "SELECT * FROM `actress_adv`;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function Add($mvId, $tagId) {
        $qr = "INSERT INTO `actress_adv` VALUES (null, '$mvId', '$tagId');";
        $this->conn->query($qr);
    }

    public function DeleteByActress($id) {
        $qr = "DELETE FROM `actress_adv` WHERE actressId=$id;";
        $this->conn->query($qr);
    }

    public function DeleteByAdv($id) {
        $qr = "DELETE FROM `actress_adv` WHERE advId=$id;";
        $this->conn->query($qr);
    }
}
?>