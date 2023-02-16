<?php 
$mvs = json_decode($data['mvs']);
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
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <!-- /# column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Danh sách</h4>
                            <!-- <p class="f-s-13">Tổng: 16.000.000 VND</p> -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Ảnh bìa</th>
                                        <th>Link</th>
                                        <th>Thể loại</th>
                                        <th>Diễn viên</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mvs as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->{'code'} ?></td>
                                        <td><img width="200px" src="<?php echo $appRootURL . $row->{'thumbnail'} ?>" alt=""></td>
                                        <td>
                                            <a target="_blank" href="<?php echo $row->{'links'} ?>">
                                                <?php echo $row->{'links'} ?>
                                            </a>
                                        </td>
                                        <td><b>top 1</b>, <b>top 2</b>, <b>top 3</b></td>
                                        <td><b>top 1dasd</b>, <b>top 2dasd</b>, <b>top dasdsd3</b></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo $appRootURL ?>/mv/edit/<?php echo $row->{'id'} ?>" type="button" class="btn btn-rounded btn-secondary"><span class="btn-icon-left"><i class="mdi mdi-grease-pencil color-secondary"></i> </span>Cập nhật</a>
                                                <a href="<?php echo $appRootURL ?>/mv/delete/<?php echo $row->{'id'} ?>" type="button" class="btn btn-rounded btn-primary"><span class="btn-icon-left"><i class="mdi mdi-delete color-primary"></i> </span>Xóa</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>