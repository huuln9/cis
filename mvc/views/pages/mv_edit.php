<?php 
$mv = json_decode($data['mv']);
$actresses = json_decode($data['actresses']);
$tags = json_decode($data['tags']);
$mvActresss = json_decode($data['mvActresss']);
$mvTags = json_decode($data['mvTags']);
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
                    <li class="breadcrumb-item active">Cập nhật</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cập nhật</h4>
                        <div class="basic-form">
                            <form  class='form-valide' action='<?php echo $appRootURL ?>/mv/editbe' method='post' enctype='multipart/form-data'>
                                <?php foreach ($mv as $row) { ?>
                                <input type='hidden' name='_token' value='{{csrf_token()}}'/>
                                <input type='hidden' name='val-id' value='<?php echo $row->{'id'} ?>'/>
                                <input type='hidden' name='val-oldAvt' value='<?php echo $row->{'avatar'} ?>'/>
                                <div class="form-group">
                                    <input name='val-code' value='<?php echo $row->{'code'} ?>' placeholder="Code" class="form-control input-default">
                                </div>
                                <div class="form-group">
                                    <label for="">Ảnh bìa</label>
                                    <input name='val-thumbnail' type="file" class="form-control input-default">
                                </div>
                                <div class="form-group">
                                    <input name='val-links' value='<?php echo $row->{'links'} ?>' placeholder="Link *" class="form-control input-default" required>
                                </div>
                                <div class="row">
                                    <div class="form-group mt-3 col-lg-9">
                                        <label for="">Diễn viên</label><br>
                                        <select name='val-actressIds[]' size="25" class="form-select" multiple>
                                        <?php foreach ($actresses as $actress) { ?>
                                            <option
                                            <?php
                                            foreach ($mvActresss as $mvActress) {
                                                if ($mvActress->{'mvId'} == $row->{'id'} && $mvActress->{'actressId'} == $actress->{'id'}) {
                                                    echo 'selected';
                                                }
                                            }
                                            ?> 
                                            value="<?php echo $actress->{'id'} ?>">
                                                <?php echo $actress->{'name'} ?>
                                            </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 col-lg-3">
                                        <label for="">Thể loại</label><br>
                                        <select name='val-tagIds[]' size="25" class="form-select" multiple>
                                            <?php foreach ($tags as $tag) { ?>
                                            <option
                                            <?php
                                            foreach ($mvTags as $mvTag) {
                                                if ($mvTag->{'mvId'} == $row->{'id'} && $mvTag->{'tagId'} == $tag->{'id'}) {
                                                    echo 'selected';
                                                }
                                            }
                                            ?> 
                                            value="<?php echo $tag->{'id'} ?>">
                                                <?php echo $tag->{'name'} ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-rounded btn-success"><span class="btn-icon-left"><i class="mdi mdi-content-save color-success"></i> </span>Lưu</button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>