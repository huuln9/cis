<?php
class TransFee extends Controller {
    function List() {
        $this->view("main", [
            "pages" => "transfee_list"
        ]);
    }

    function Add() {
        $this->view("main", [
            "pages" => "transfee_add"
        ]);
    }
}
?>