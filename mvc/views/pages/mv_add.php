<?php 
$actresses = json_decode($data['actresses']);
$tags = json_decode($data['tags']);
?>
<div class="content-body">
    <div class="container">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>CIS, <span>Mv</span></h4>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Mv</a>
                    </li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm mới</h4>
                        <div class="basic-form">
                            <form  class='form-valide' action='<?php echo $appRootURL ?>/mv/addbe' method='post' enctype='multipart/form-data'>
                                <input type='hidden' name='_token' value='{{csrf_token()}}'/>
                                <div class="form-group">
                                    <input name='val-code' placeholder="Code" class="form-control input-default">
                                </div>
                                <div class="form-group">
                                    <label for="">Ảnh bìa</label>
                                    <input name='val-thumbnail' type="file" class="form-control input-default">
                                </div>
                                <div class="form-group">
                                    <input name='val-links' placeholder="Link *" class="form-control input-default" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Diễn viên</label><br>
                                    <select name='val-actressIds[]' size=5 class="form-select" multiple>
                                        <?php foreach ($actresses as $row) { ?>
                                        <option value="<?php echo $row->{'id'} ?>"><?php echo $row->{'name'} ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Thể loại</label><br>
                                    <select name='val-tagIds[]' size=5 class="form-select" multiple>
                                        <?php foreach ($tags as $row) { ?>
                                        <option value="<?php echo $row->{'id'} ?>"><?php echo $row->{'name'} ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-rounded btn-success"><span class="btn-icon-left"><i class="mdi mdi-content-save color-success"></i> </span>Lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>