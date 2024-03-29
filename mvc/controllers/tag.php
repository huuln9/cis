<?php
class Tag extends Controller {
    private $tagModel;
    private $mvTagModel;

    function __construct() {
        $this->tagModel = $this->model('TagModel');
        $this->mvTagModel = $this->model('MvTagModel');
    }

    function List() {
        $tags = $this->tagModel->GetAll();

        $this->view("main", [
            "pages" => "tag_list",
            "tags" => $tags,
        ]);
    }

    function Add() {
        $this->view("main", [
            "pages" => "tag_add"
        ]);
    }

    function AddBe() {
        $name = $_POST['val-name'];

        $this->tagModel->Add($name);

        header("Location: $this->appRootURL/tag/list");
    }

    function Edit($id) {
        $tag = $this->tagModel->GetOne($id);

        $this->view('main', [
            'pages' => 'tag_edit',
            'tag' => $tag
        ]);
    }

    function EditBe() {
        $id = $_POST['val-id'];
        $name = $_POST['val-name'];

        $this->tagModel->Edit($id, $name);

        header("Location: $this->appRootURL/tag/list");
    }

    function Delete($id) {
        $this->mvTagModel->DeleteByTag($id);
        $this->tagModel->Delete($id);

        header("Location: $this->appRootURL/tag/list");
    }
}
?>