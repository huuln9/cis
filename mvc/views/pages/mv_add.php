<?php 
$size = json_decode($data['size']);
$p3Size = json_decode($data['p3Size']);
$actressesP1 = json_decode($data['actressesP1']);
$actressesP2 = json_decode($data['actressesP2']);
$actressesP3 = json_decode($data['actressesP3']);
$tagsP1 = json_decode($data['tagsP1']);
$tagsP2 = json_decode($data['tagsP2']);
$tagsP3 = json_decode($data['tagsP3']);
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
                                <div>Giới hạn hiện tại: <?php echo $size + $size + $p3Size ?> (<?php echo $size . '/' . $size . '/' . $p3Size ?>)</div>
                                <div class="row">
                                    <div class="form-group mt-3 col-lg-2">
                                        <label for="">Diễn viên</label><br>
                                        <select name='val-actressIds[]' size="<?php echo $size ?>" class="form-select" multiple>
                                            <?php foreach ($actressesP1 as $adv) { ?>
                                            <option value="<?php echo $adv->{'id'} ?>"><?php echo $adv->{'name'} ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-2" style="margin-top: 45px;">
                                        <!-- <label for="">Diễn viên</label><br> -->
                                        <select name='val-actressIds[]' size="<?php echo $size ?>" class="form-select" multiple>
                                            <?php foreach ($actressesP2 as $adv) { ?>
                                            <option value="<?php echo $adv->{'id'} ?>"><?php echo $adv->{'name'} ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-2" style="margin-top: 45px;">
                                        <!-- <label for="">Diễn viên</label><br> -->
                                        <select name='val-actressIds[]' size="<?php echo $size ?>" class="form-select" multiple>
                                            <?php foreach ($actressesP3 as $adv) { ?>
                                            <option value="<?php echo $adv->{'id'} ?>"><?php echo $adv->{'name'} ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 col-lg-2">
                                        <label for="">Thể loại</label><br>
                                        <select name='val-tagIds[]' size="<?php echo $size ?>" class="form-select" multiple>
                                            <?php foreach ($tagsP1 as $row) { ?>
                                            <option value="<?php echo $row->{'id'} ?>"><?php echo $row->{'name'} ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-2" style="margin-top: 45px;">
                                        <!-- <label for="">Thể loại</label><br> -->
                                        <select name='val-tagIds[]' size="<?php echo $size ?>" class="form-select" multiple>
                                            <?php foreach ($tagsP2 as $row) { ?>
                                            <option value="<?php echo $row->{'id'} ?>"><?php echo $row->{'name'} ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-2" style="margin-top: 45px;">
                                        <!-- <label for="">Thể loại</label><br> -->
                                        <select name='val-tagIds[]' size="<?php echo $size ?>" class="form-select" multiple>
                                            <?php foreach ($tagsP3 as $row) { ?>
                                            <option value="<?php echo $row->{'id'} ?>"><?php echo $row->{'name'} ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <button type='submit' class='btn btn-whatsapp'><i class='mdi mdi-content-save'></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>