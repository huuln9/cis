<?php
class Controller {
    protected $appRootURL = "http://localhost/github/cis";
    protected $appRootDir = "C:/xampp/htdocs/github/cis";

    protected $limit = 20; // part size
    protected $p3Limit = 100; // part 3 size
    // part start index
    protected $part1 = 0;
    protected $part2 = 20;
    protected $part3 = 40;

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