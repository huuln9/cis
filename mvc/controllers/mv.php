<?php
class Mv extends Controller {
    function List() {
        $this->view("main", [
            "pages" => "mv_list"
        ]);
    }

    function Add() {
        $this->view("main", [
            "pages" => "mv_add"
        ]);
    }
}
?>