<?php 
$tags = json_decode($data['tags']);
?>
<div class="content-body">
    <div class="container">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>CIS, <span>Thể loại</span></h4>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Thể loại</a>
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
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tags as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->{'name'} ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo $appRootURL ?>/tag/edit/<?php echo $row->{'id'} ?>" type="button" class="btn btn-rounded btn-secondary"><span class="btn-icon-left"><i class="mdi mdi-grease-pencil color-secondary"></i> </span>Cập nhật</a>
                                                <a href="<?php echo $appRootURL ?>/tag/delete/<?php echo $row->{'id'} ?>" type="button" class="btn btn-rounded btn-primary"><span class="btn-icon-left"><i class="mdi mdi-delete color-primary"></i> </span>Xóa</a>
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