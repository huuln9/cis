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

    function Edit($id) {
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

    function Delete($id) {
        $this->actressAdvModel->DeleteByAdv($id);
        $this->advModel->Delete($id);

        header("Location: $this->appRootURL/adv/list");
    }
}
?>