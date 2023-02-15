<?php
class Salary extends Controller {
    function List() {
        $this->view("main", [
            "pages" => "salary_list"
        ]);
    }

    function Add() {
        $this->view("main", [
            "pages" => "salary_add"
        ]);
    }
}
?>