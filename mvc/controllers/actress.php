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
        $name = $_POST['val-name'];
        $avatar = $_FILES['val-avatar'];
        $avatarDir = "/public/storage/" . $avatar['name'] . time();

        if(isset($avatar) && $avatar['size'] > 0) {
            move_uploaded_file($avatar['tmp_name'], "." . $avatarDir);

            $this->actressModel->Add($name, $avatarDir);
        } else {
            $this->actressModel->Add($name, null);
        }

        header("Location: $this->appRootURL/actress/list");
    }

    function Edit() {
        $urlArr = explode("/", $_SERVER['REQUEST_URI']);
        $id = $urlArr[count($urlArr) - 1];

        $actress = $this->actressModel->GetOne($id);

        $this->view('main', [
            'pages' => 'actress_edit',
            'actress' => $actress
        ]);
    }

    function EditBe() {
        $id = $_POST['val-id'];
        $name = $_POST['val-name'];
        $avatar = $_FILES['val-avatar'];
        $avatarDir = "/public/storage/" . $avatar['name'] . time();
        $oldAvt = $_POST['val-oldAvt'];

        if(isset($avatar) && $avatar['size'] > 0) {
            $file = $this->appRootDir . $oldAvt;
            if (is_file($file)) unlink($file);

            move_uploaded_file($avatar['tmp_name'], "." . $avatarDir);

            $this->actressModel->Edit($id, $name, $avatarDir);
        } else {
            $this->actressModel->EditNotAvt($id, $name);
        }

        header("Location: $this->appRootURL/actress/list");
    }

    function Delete() {
        $urlArr = explode("/", $_SERVER['REQUEST_URI']);
        $id = $urlArr[count($urlArr) - 1];

        $actress = json_decode($this->actressModel->GetOne($id));
        foreach ($actress as $row) {
            $file = $this->appRootDir . $row->{'avatar'};
            if (is_file($file)) unlink($file);
        }

        $this->actressModel->Delete($id);

        header("Location: $this->appRootURL/actress/list");
    }
}
?>