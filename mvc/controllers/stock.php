<?php
class Stock extends Controller {
    function List() {
        $this->view("main", [
            "pages" => "stock_list"
        ]);
    }

    function Add() {
        $this->view("main", [
            "pages" => "stock_add"
        ]);
    }
}
?>