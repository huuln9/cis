<?php
class Actress extends Controller {
    function List() {
        $this->view("main", [
            "pages" => "actress_list"
        ]);
    }

    function Add() {
        $this->view("main", [
            "pages" => "actress_add"
        ]);
    }
}
?>