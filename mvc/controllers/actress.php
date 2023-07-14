<?php
class Actress extends Controller {
    private $actressModel;
    private $mvActressModel;
    private $advModel;
    private $actressAdvModel;

    function __construct() {
        $this->actressModel = $this->model('ActressModel');
        $this->mvActressModel = $this->model('MvActressModel');
        $this->advModel = $this->model('AdvModel');
        $this->actressAdvModel = $this->model('ActressAdvModel');
    }

    function List($page) {
        $actresses = $this->actressModel->GetPart(100, $page * 100);
        $actressAdvs = $this->actressAdvModel->GetAll();
        $advs = $this->advModel->GetAll();

        $this->view('main', [
            'pages' => 'actress_list',
            'actresses' => $actresses,
            'actressAdvs' => $actressAdvs,
            'advs' => $advs
        ]);
    }

    function f($name) {
        $actresses = $this->actressModel->GetByName($name);
        $actressAdvs = $this->actressAdvModel->GetAll();
        $advs = $this->advModel->GetAll();

        $this->view('main', [
            'pages' => 'actress_list',
            'actresses' => $actresses,
            'actressAdvs' => $actressAdvs,
            'advs' => $advs
        ]);
    }

    function Home() {
        $this->view('main', [
            'pages' => 'actress_home'
        ]);
    }

    function Add() {
        $advs = $this->advModel->GetAll();

        $this->view('main', [
            'pages' => 'actress_add',
            "advs" => $advs,
        ]);
    }

    function AddBe() {
        $name = $_POST['val-name'];
        $otherNames = $_POST['val-otherNames'];
        $avatar = $_FILES['val-avatar'];
        $avatarDir = "/public/storage/" . $avatar['name'] . time();
        if(isset($_POST['val-advIds'])) $advIds = ($_POST['val-advIds']);

        if(isset($avatar) && $avatar['size'] > 0) {
            move_uploaded_file($avatar['tmp_name'], "." . $avatarDir);

            $this->actressModel->Add($name, $otherNames, $avatarDir);
        } else {
            $this->actressModel->Add($name, $otherNames, null);
        }

        $this->saveFk($advIds);

        header("Location: $this->appRootURL/actress/list/0");
    }

    function saveFk($advIds) {
        $lastActressIdRs = json_decode($this->actressModel->GetLastId());
        $actressId = $lastActressIdRs[0]->{'MAX(id)'};

        if(isset($advIds)) {
            foreach($advIds as $advId) {
                $this->actressAdvModel->Add($actressId, $advId);
            }
        }
    }

    function updateFk($actressId, $advIds) {
        if(isset($advIds)) {
            $this->actressAdvModel->DeleteByActress($actressId);
            foreach($advIds as $advId) {
                $this->actressAdvModel->Add($actressId, $advId);
            }
        }
    }

    function Edit($id) {
        $actress = $this->actressModel->GetOne($id);
        $advs = $this->advModel->GetAll();
        $actressAdvs = $this->actressAdvModel->GetAll();

        $this->view('main', [
            'pages' => 'actress_edit',
            'actress' => $actress,
            "advs" => $advs,
            "actressAdvs" => $actressAdvs
        ]);
    }

    function EditBe() {
        $id = $_POST['val-id'];
        $name = $_POST['val-name'];
        $otherNames = $_POST['val-otherNames'];
        $avatar = $_FILES['val-avatar'];
        $avatarDir = "/public/storage/" . $avatar['name'] . time();
        $oldAvt = $_POST['val-oldAvt'];
        if(isset($_POST['val-advIds'])) $advIds = ($_POST['val-advIds']);

        if(isset($avatar) && $avatar['size'] > 0) {
            $file = $this->appRootDir . $oldAvt;
            if (is_file($file)) unlink($file);

            move_uploaded_file($avatar['tmp_name'], "." . $avatarDir);

            $this->actressModel->Edit($id, $name, $otherNames, $avatarDir);
        } else {
            $this->actressModel->EditNotAvt($id, $name, $otherNames);
        }

        $this->updateFk($id, $advIds);

        header("Location: $this->appRootURL/actress/list/0");
    }

    function Delete($id) {
        $actress = json_decode($this->actressModel->GetOne($id));
        foreach ($actress as $row) {
            $file = $this->appRootDir . $row->{'avatar'};
            if (is_file($file)) unlink($file);
        }

        $this->mvActressModel->DeleteByActress($id);
        $this->actressAdvModel->DeleteByActress($id);
        $this->actressModel->Delete($id);

        header("Location: $this->appRootURL/actress/list/0");
    }
}
?>