<?php
class Actress extends Controller {
    private $actressModel;

    function __construct() {
        $this->actressModel = $this->model('ActressModel');
    }

    function List() {
        $actresses = $this->actressModel->GetAll();

        $this->view('main', [
            'pages' => 'actress_list',
            'actresses' => $actresses
        ]);
    }

    function Add() {
        $this->view('main', [
            'pages' => 'actress_add'
        ]);
    }

    function AddBe() {
        if(isset($_FILES['val-avatar'])) {
            move_uploaded_file($_FILES['val-avatar']['tmp_name'], "./public/storage/" . $_FILES['val-avatar']['name']);
        }

        $this->actressModel->Add($_POST['val-name'], $this->appRootDir . $_FILES['val-avatar']['name']);

        header("Location: $this->appRootURL/actress/list");
    }
}
?>