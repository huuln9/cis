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
                                    <label for=''>Ảnh đại diện</label>
                                    <input name='val-avatar' type='file' class='form-control input-default'>
                                </div>
                                <button type='submit' class='btn btn-rounded btn-success'><span class='btn-icon-left'><i class='mdi mdi-content-save color-success'></i> </span>Lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>