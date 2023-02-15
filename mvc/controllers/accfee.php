<?php
class AccFee extends Controller {
    function List() {
        $this->view("main", [
            "pages" => "accfee_list"
        ]);
    }

    function Add() {
        $this->view("main", [
            "pages" => "accfee_add"
        ]);
    }
}
?>