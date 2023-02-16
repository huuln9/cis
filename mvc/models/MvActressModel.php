<?php
class MvActressModel extends Database {
    public function GetAll() {
        $qr = "SELECT * FROM `mv_actress`;";
        $rs = $this->conn->query($qr);
        
        $arr = array();
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function Add($mvId, $actressId) {
        $qr = "INSERT INTO `mv_actress` VALUES (null, '$mvId', '$actressId');";
        $this->conn->query($qr);
    }

    public function DeleteByMv($id) {
        $qr = "DELETE FROM `mv_actress` WHERE mvId=$id;";
        $this->conn->query($qr);
    }
}
?>