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

    function List1() {
        $actresses = $this->actressModel->GetPart(100, 0);
        $actressAdvs = $this->actressAdvModel->GetAll();
        $advs = $this->advModel->GetAll();

        $this->view('main', [
            'pages' => 'actress_list',
            'actresses' => $actresses,
            'actressAdvs' => $actressAdvs,
            'advs' => $advs
        ]);
    }

    function List2() {
        $actresses = $this->actressModel->GetPart(100, 100);
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
        $advsP1 = $this->advModel->GetPart($this->limit, $this->part1);
        $advsP2 = $this->advModel->GetPart($this->limit, $this->part2);
        $advsP3 = $this->advModel->GetPart($this->p3Limit, $this->part3);

        $this->view('main', [
            'pages' => 'actress_add',
            "size" => $this->limit,
            "p3Size" => $this->p3Limit,
            "advsP1" => $advsP1,
            "advsP2" => $advsP2,
            "advsP3" => $advsP3
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

        header("Location: $this->appRootURL/actress/list");
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

    function Edit() {
        $urlArr = explode("/", $_SERVER['REQUEST_URI']);
        $id = $urlArr[count($urlArr) - 1];

        $actress = $this->actressModel->GetOne($id);
        $advsP1 = $this->advModel->GetPart($this->limit, $this->part1);
        $advsP2 = $this->advModel->GetPart($this->limit, $this->part2);
        $advsP3 = $this->advModel->GetPart($this->p3Limit, $this->part3);
        $actressAdvs = $this->actressAdvModel->GetAll();

        $this->view('main', [
            'pages' => 'actress_edit',
            'actress' => $actress,
            "size" => $this->limit,
            "p3Size" => $this->p3Limit,
            "advsP1" => $advsP1,
            "advsP2" => $advsP2,
            "advsP3" => $advsP3,
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

        $this->mvActressModel->DeleteByActress($id);
        $this->actressAdvModel->DeleteByActress($id);
        $this->actressModel->Delete($id);

        header("Location: $this->appRootURL/actress/list");
    }
}
?>