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

    function Delete() {
        $urlArr = explode("/", $_SERVER['REQUEST_URI']);
        $id = $urlArr[count($urlArr) - 1];

        $mv = json_decode($this->mvModel->GetOne($id));
        foreach ($mv as $row) {
            $file = $this->appRootDir . $row->{'thumbnail'};
            if (is_file($file)) unlink($file);
        }

        $this->mvModel->Delete($id);

        header("Location: $this->appRootURL/mv/list");
    }
}
?>