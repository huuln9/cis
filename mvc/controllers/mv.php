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

    function ListByActress($actressId) {
        $mvs = array();
        $mvActresss1Rs = $this->mvActressModel->GetByActress($actressId);
        $mvActresss1 = json_decode($mvActresss1Rs);
        foreach ($mvActresss1 as $mvActress1) {
            $mvRs = $this->mvModel->GetOne($mvActress1->mvId);
            $mv = json_decode($mvRs);
            array_push($mvs, $mv[0]);
        }
        
        $mvActresss = $this->mvActressModel->GetAll();
        $mvTags = $this->mvTagModel->GetAll();
        $actresses = $this->actressModel->GetOne($actressId);
        $tags = $this->tagModel->GetAll();

        $this->view("main", [
            "pages" => "mv_list_by_a",
            "mvs" => $mvs,
            "mvActresss" => $mvActresss,
            "mvTags" => $mvTags,
            "actresses" => $actresses,
            "tags" => $tags
        ]);
    }

    function ListByTag($tagId) {
        $mvs = array();
        $mvTags1Rs = $this->mvTagModel->GetByTag($tagId);
        $mvTags1 = json_decode($mvTags1Rs);
        foreach ($mvTags1 as $mvTag1) {
            $mvRs = $this->mvModel->GetOne($mvTag1->mvId);
            $mv = json_decode($mvRs);
            array_push($mvs, $mv[0]);
        }
        
        $mvActresss = $this->mvActressModel->GetAll();
        $mvTags = $this->mvTagModel->GetAll();
        $actresses = $this->actressModel->GetAll();
        $tags = $this->tagModel->GetOne($tagId);

        $this->view("main", [
            "pages" => "mv_list_by_t",
            "mvs" => $mvs,
            "mvActresss" => $mvActresss,
            "mvTags" => $mvTags,
            "actresses" => $actresses,
            "tags" => $tags
        ]);
    }

    function f($code) {
        $mvs = $this->mvModel->GetByCode($code);
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

    function List($page) {
        $mvs = $this->mvModel->GetPart(100, $page * 100);
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
        $actresses = $this->actressModel->GetAll();
        $tags = $this->tagModel->GetAll();

        $this->view("main", [
            "pages" => "mv_add",
            "actresses" => $actresses,
            "tags" => $tags
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

        header("Location: $this->appRootURL/mv/list/0");
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

    function Edit($id) {
        $mv = $this->mvModel->GetOne($id);
        $actresses = $this->actressModel->GetAll();
        $tags = $this->tagModel->GetAll();
        $mvActresss = $this->mvActressModel->GetAll();
        $mvTags = $this->mvTagModel->GetAll();

        $this->view('main', [
            'pages' => 'mv_edit',
            "mv" => $mv,
            "actresses" => $actresses,
            "tags" => $tags,
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

        header("Location: $this->appRootURL/mv/list/0");
    }

    function Delete($id) {
        $mv = json_decode($this->mvModel->GetOne($id));
        foreach ($mv as $row) {
            $file = $this->appRootDir . $row->{'thumbnail'};
            if (is_file($file)) unlink($file);
        }

        $this->mvActressModel->DeleteByMv($id);
        $this->mvTagModel->DeleteByMv($id);
        $this->mvModel->Delete($id);

        header("Location: $this->appRootURL/mv/list/0");
    }
}
?>