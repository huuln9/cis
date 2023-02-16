<?php
class MvActressModel extends Database {
    // public function GetAll() {
    //     $qr = "SELECT * FROM `mv`;";
    //     $rs = $this->conn->query($qr);
        
    //     $arr = array();
    //     while ($row = $rs->fetch_assoc()) {
    //         $arr[] = $row;
    //     }
    //     return json_encode($arr);
    // }

    // public function GetOne($id) {
    //     $qr = "SELECT * FROM `mv` WHERE `id`=$id;";
    //     $rs = $this->conn->query($qr);
        
    //     $arr = array();
    //     while ($row = $rs->fetch_assoc()) {
    //         $arr[] = $row;
    //     }
    //     return json_encode($arr);
    // }

    public function Add($mvId, $actressId) {
        $qr = "INSERT INTO `mv_actress` VALUES (null, '$mvId', '$actressId');";
        $this->conn->query($qr);
    }

    // public function Edit($id, $name) {
    //     $qr = "UPDATE `mv` SET `name`='$name' WHERE `id`=$id;";
    //     $this->conn->query($qr);
    // }

    // public function Delete($id) {
    //     $qr = "DELETE FROM `mv` WHERE id=$id;";
    //     $this->conn->query($qr);
    // }
}
?>