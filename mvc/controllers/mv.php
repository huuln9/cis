<?php
class Mv extends Controller {
    private $mvModel;
    private $actressModel;
    private $tagModel;

    function __construct() {
        $this->mvModel = $this->model('MvModel');
        $this->actressModel = $this->model('ActressModel');
        $this->tagModel = $this->model('TagModel');
    }

    function List() {
        $mvs = $this->mvModel->GetAll();

        $this->view("main", [
            "pages" => "mv_list",
            "mvs" => $mvs
        ]);
    }

    function Add() {
        $actresses = $this->actressModel->GetAll();
        $tags = $this->tagModel->GetAll();

        $this->view("main", [
            "pages" => "mv_add",
            "actresses" => $actresses,
            "tags" => $tags
        ]);
    }

    function AddBe() {
        // $code = $_POST['val-code'];
        // $thumbnail = $_FILES['val-thumbnail'];
        // $thumbnailDir = "/public/storage/" . $thumbnail['name'];
        // $links = $_POST['val-links'];
        $tags = ($_POST['val-tags']);
        // $actresses = $_POST['val-actresses'];

        if(isset($thumbnail) && $thumbnail['size'] > 0) {
            // move_uploaded_file($thumbnail['tmp_name'], "." . $thumbnailDir);

            // $this->mvModel->Add($code, $thumbnailDir, $links);

            if($tags['size'] > 0) echo 'r'; else echo 'f';
        } else {
            // $this->mvModel->Add($code, null, $links);
        }
    }
}
?>