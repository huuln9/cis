<?php
class Controller {
    protected $appRootURL = "http://localhost/github/cis";
    protected $appRootDir = "C:/xampp/htdocs/github/cis";

    protected $limit = 10;
    protected $part1 = 0;
    protected $part2 = 10;
    protected $part3 = 20;

    public function model($model) {
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data = []) {
        require_once "./mvc/core/variable.php";
        require_once "./mvc/views/".$view.".php";
    }
}
?>