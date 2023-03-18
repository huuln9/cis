<?php 
$size = json_decode($data['size']);
$p3Size = json_decode($data['p3Size']);
$advsP1 = json_decode($data['advsP1']);
$advsP2 = json_decode($data['advsP2']);
$advsP3 = json_decode($data['advsP3']);
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
                    <li class='breadcrumb-item active'>Thêm mới</li>
                </ol>
            </div>
        </div>
        <div class='row'>
            <div class='col-lg-12'>
                <div class='card'>
                    <div class='card-body'>
                        <h4 class='card-title'>Thêm mới</h4>
                        <div class='basic-form'>
                            <form class='form-valide' action='<?php echo $appRootURL ?>/actress/addbe' method='post' enctype='multipart/form-data'>
                                <input type='hidden' name='_token' value='{{csrf_token()}}'/>
                                <div class='form-group'>
                                    <input name='val-name' placeholder='Tên *' class='form-control input-default' required>
                                </div>
                                <div class='form-group'>
                                    <input name='val-otherNames' placeholder='Các tên khác' class='form-control input-default'>
                                </div>
                                <div class='form-group'>
                                    <label for=''>Ảnh đại diện</label>
                                    <input name='val-avatar' type='file' class='form-control input-default'>
                                </div>
                                <div>Giới hạn hiện tại: <?php echo $size + $size + $p3Size ?> (<?php echo $size . '/' . $size . '/' . $p3Size ?>)</div>
                                <div class="row">
                                    <div class="form-group mt-3 col-lg-4">
                                        <label for="">Đặc điểm</label><br>
                                        <select name='val-advIds[]' size="<?php echo $size ?>" class="form-select" multiple>
                                            <?php foreach ($advsP1 as $adv) { ?>
                                            <option value="<?php echo $adv->{'id'} ?>"><?php echo $adv->{'name'} ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4" style="margin-top: 45px;">
                                        <!-- <label for="">Diễn viên</label><br> -->
                                        <select name='val-advIds[]' size="<?php echo $size ?>" class="form-select" multiple>
                                            <?php foreach ($advsP2 as $adv) { ?>
                                            <option value="<?php echo $adv->{'id'} ?>"><?php echo $adv->{'name'} ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4" style="margin-top: 45px;">
                                        <!-- <label for="">Diễn viên</label><br> -->
                                        <select name='val-advIds[]' size="<?php echo $size ?>" class="form-select" multiple>
                                            <?php foreach ($advsP3 as $adv) { ?>
                                            <option value="<?php echo $adv->{'id'} ?>"><?php echo $adv->{'name'} ?></option>
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