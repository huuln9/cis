<?php
class Mv extends Controller {
    private $mvModel;
    private $actressModel;
    private $tagModel;
    private $mvActressModel;
    private $mvTagModel;

    function __construct() {
        $this->mvModel = $this->model('MvModel');
        $this->actressModel = $this->model('ActressModel');
        $this->tagModel = $this->model('TagModel');
        $this->mvActressModel = $this->model('MvActressModel');
        $this->mvTagModel = $this->model('MvTagModel');
    }

    function List() {
        $mvs = $this->mvModel->GetAll();
        $mvActresss = $this->mvActressModel->GetAll();
        $mvTags = $this->mvTagModel->GetAll();
        $actresses = $this->actressModel->GetAll();
        $tags = $this->tagModel->GetAll();

        $this->view("main", [
            "pages" => "mv_list",
            "mvs" => $mvs,
            "mvActresss" => $mvActresss,
            "mvTags" => $mvTags,
            "actresses" => $actresses,
            "tags" => $tags
        ]);
    }

    function Add() {
        $actressesP1 = $this->actressModel->GetPart($this->limit, $this->part1);
        $actressesP2 = $this->actressModel->GetPart($this->limit, $this->part2);
        $actressesP3 = $this->actressModel->GetPart($this->p3Limit, $this->part3);
        $tagsP1 = $this->tagModel->GetPart($this->limit, $this->part1);
        $tagsP2 = $this->tagModel->GetPart($this->limit, $this->part2);
        $tagsP3 = $this->tagModel->GetPart($this->p3Limit, $this->part3);

        $this->view("main", [
            "pages" => "mv_add",
            "size" => $this->limit,
            "p3Size" => $this->p3Limit,
            "actressesP1" => $actressesP1,
            "actressesP2" => $actressesP2,
            "actressesP3" => $actressesP3,
            "tagsP1" => $tagsP1,
            "tagsP2" => $tagsP2,
            "tagsP3" => $tagsP3
        ]);
    }

    function AddBe() {
        $code = $_POST['val-code'];
        $thumbnail = $_FILES['val-thumbnail'];
        $thumbnailDir = "/public/storage/" . $thumbnail['name'] . time();
        $links = $_POST['val-links'];
        if(isset($_POST['val-actressIds'])) $actressIds = $_POST['val-actressIds'];
        if(isset($_POST['val-tagIds'])) $tagIds = ($_POST['val-tagIds']);

        if(isset($thumbnail) && $thumbnail['size'] > 0) {
            move_uploaded_file($thumbnail['tmp_name'], "." . $thumbnailDir);

            $this->mvModel->Add($code, $thumbnailDir, $links);
        } else {
            $this->mvModel->Add($code, null, $links);
        }

        $this->saveFk($actressIds, $tagIds);

        header("Location: $this->appRootURL/mv/list");
    }

    function saveFk($actressIds, $tagIds) {
        $lastMvIdRs = json_decode($this->mvModel->GetLastId());
        $mvId = $lastMvIdRs[0]->{'MAX(id)'};

        if(isset($actressIds)) {
            foreach($actressIds as $actressId) {
                $this->mvActressModel->Add($mvId, $actressId);
            }
        }
        if(isset($tagIds)) {
            foreach($tagIds as $tagId) {
                $this->mvTagModel->Add($mvId, $tagId);
            }
        }
    }

    function updateFk($mvId, $actressIds, $tagIds) {
        if(isset($actressIds)) {
            $this->mvActressModel->DeleteByMv($mvId);
            foreach($actressIds as $actressId) {
                $this->mvActressModel->Add($mvId, $actressId);
            }
        }
        if(isset($tagIds)) {
            $this->mvTagModel->DeleteByMv($mvId);
            foreach($tagIds as $tagId) {
                $this->mvTagModel->Add($mvId, $tagId);
            }
        }
    }

    function Edit() {
        $urlArr = explode("/", $_SERVER['REQUEST_URI']);
        $id = $urlArr[count($urlArr) - 1];

        $mv = $this->mvModel->GetOne($id);
        $actressesP1 = $this->actressModel->GetPart($this->limit, $this->part1);
        $actressesP2 = $this->actressModel->GetPart($this->limit, $this->part2);
        $actressesP3 = $this->actressModel->GetPart($this->p3Limit, $this->part3);
        $tagsP1 = $this->tagModel->GetPart($this->limit, $this->part1);
        $tagsP2 = $this->tagModel->GetPart($this->limit, $this->part2);
        $tagsP3 = $this->tagModel->GetPart($this->p3Limit, $this->part3);
        $mvActresss = $this->mvActressModel->GetAll();
        $mvTags = $this->mvTagModel->GetAll();

        $this->view('main', [
            'pages' => 'mv_edit',
            "mv" => $mv,
            "size" => $this->limit,
            "p3Size" => $this->p3Limit,
            "actressesP1" => $actressesP1,
            "actressesP2" => $actressesP2,
            "actressesP3" => $actressesP3,
            "tagsP1" => $tagsP1,
            "tagsP2" => $tagsP2,
            "tagsP3" => $tagsP3,
            "mvActresss" => $mvActresss,
            "mvTags" => $mvTags
        ]);
    }

    function EditBe() {
        $id = $_POST['val-id'];
        $oldAvt = $_POST['val-oldAvt'];
        $code = $_POST['val-code'];
        $thumbnail = $_FILES['val-thumbnail'];
        $thumbnailDir = "/public/storage/" . $thumbnail['name'] . time();
        $links = $_POST['val-links'];
        if(isset($_POST['val-actressIds'])) $actressIds = $_POST['val-actressIds'];
        if(isset($_POST['val-tagIds'])) $tagIds = ($_POST['val-tagIds']);

        if(isset($thumbnail) && $thumbnail['size'] > 0) {
            $file = $this->appRootDir . $oldAvt;
            if (is_file($file)) unlink($file);

            move_uploaded_file($thumbnail['tmp_name'], "." . $thumbnailDir);

            $this->mvModel->Edit($id, $code, $thumbnailDir, $links);
        } else {
            $this->mvModel->EditNotAvt($id, $code, $links);
        }

        $this->updateFk($id, $actressIds, $tagIds);

        header("Location: $this->appRootURL/mv/list");
    }

    function Delete() {
        $urlArr = explode("/", $_SERVER['REQUEST_URI']);
        $id = $urlArr[count($urlArr) - 1];

        $mv = json_decode($this->mvModel->GetOne($id));
        foreach ($mv as $row) {
            $file = $this->appRootDir . $row->{'thumbnail'};
            if (is_file($file)) unlink($file);
        }

        $this->mvActressModel->DeleteByMv($id);
        $this->mvTagModel->DeleteByMv($id);
        $this->mvModel->Delete($id);

        header("Location: $this->appRootURL/mv/list");
    }
}
?>