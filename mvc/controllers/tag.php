<?php
class Tag extends Controller {
    function List() {
        $this->view("main", [
            "pages" => "tag_list"
        ]);
    }

    function Add() {
        $this->view("main", [
            "pages" => "tag_add"
        ]);
    }
}
?>