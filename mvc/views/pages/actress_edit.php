<?php 
$actress = json_decode($data['actress']);
$advs = json_decode($data['advs']);
$actressAdvs = json_decode($data['actressAdvs']);
?>
<div class='content-body'>
    <div class='container'>
        <div class='row page-titles'>
            <div class='col p-0'>
                <h4>CIS, <span>Diễn viên</span></h4>
            </div>
            <div class='col p-0'>
                <ol class='breadcrumb'>
                    <li class='breadcrumb-item'><a href='javascript:void(0)'>Diễn viên</a>
                    </li>
                    <li class='breadcrumb-item active'>Cập nhật</li>
                </ol>
            </div>
        </div>
        <div class='row'>
            <div class='col-lg-12'>
                <div class='card'>
                    <div class='card-body'>
                        <h4 class='card-title'>Cập nhật</h4>
                        <div class='basic-form'>
                            <form class='form-valide' action='<?php echo $appRootURL ?>/actress/editbe' method='post' enctype='multipart/form-data'>
                                <?php foreach ($actress as $row) { ?>
                                <input type='hidden' name='_token' value='{{csrf_token()}}'/>
                                <input type='hidden' name='val-id' value='<?php echo $row->{'id'} ?>'/>
                                <input type='hidden' name='val-oldAvt' value='<?php echo $row->{'avatar'} ?>'/>
                                <div class='form-group'>
                                    <input name='val-name' value="<?php echo $row->{'name'} ?>" placeholder='Tên *' class='form-control input-default' required>
                                </div>
                                <div class='form-group'>
                                    <label for=''>Ảnh đại diện</label>
                                    <input name='val-avatar' type='file' class='form-control input-default'>
                                </div>
                                <div class="row">
                                    <div class="form-group mt-3 col-lg-12">
                                        <label for="">Đặc điểm</label><br>
                                        <select name='val-advIds[]' size="25" class="form-select" multiple>
                                            <?php foreach ($advs as $adv) { ?>
                                                <option
                                                <?php
                                                foreach ($actressAdvs as $actressAdv) {
                                                    if ($actressAdv->{'actressId'} == $row->{'id'} && $actressAdv->{'advId'} == $adv->{'id'}) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> 
                                                value="<?php echo $adv->{'id'} ?>">
                                                    <?php echo $adv->{'name'} ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <button type='submit' class='btn btn-rounded btn-success'><span class='btn-icon-left'><i class='mdi mdi-content-save color-success'></i> </span>Lưu</button>
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