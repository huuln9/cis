<?php
class CashFlow extends Controller {
    function List() {
        $this->view("main", [
            "pages" => "cashflow_list"
        ]);
    }

    function Add() {
        $this->view("main", [
            "pages" => "cashflow_add"
        ]);
    }
}
?>