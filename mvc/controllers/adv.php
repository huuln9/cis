<?php
class Adv extends Controller {
    private $advModel;
    private $actressAdvModel;

    function __construct() {
        $this->advModel = $this->model('AdvModel');
        $this->actressAdvModel = $this->model('ActressAdvModel');
    }

    function List() {
        $advs = $this->advModel->GetAll();

        $this->view("main", [
            "pages" => "adv_list",
            "advs" => $advs,
        ]);
    }

    function Add() {
        $this->view("main", [
            "pages" => "adv_add"
        ]);
    }

    function AddBe() {
        $name = $_POST['val-name'];

        $this->advModel->Add($name);

        header("Location: $this->appRootURL/adv/list");
    }

    function Edit() {
        $urlArr = explode("/", $_SERVER['REQUEST_URI']);
        $id = $urlArr[count($urlArr) - 1];

        $adv = $this->advModel->GetOne($id);

        $this->view('main', [
            'pages' => 'adv_edit',
            'adv' => $adv
        ]);
    }

    function EditBe() {
        $id = $_POST['val-id'];
        $name = $_POST['val-name'];

        $this->advModel->Edit($id, $name);

        header("Location: $this->appRootURL/adv/list");
    }

    function Delete() {
        $urlArr = explode("/", $_SERVER['REQUEST_URI']);
        $id = $urlArr[count($urlArr) - 1];

        $this->actressAdvModel->DeleteByAdv($id);
        $this->advModel->Delete($id);

        header("Location: $this->appRootURL/adv/list");
    }
}
?>