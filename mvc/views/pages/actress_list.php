<?php 
$actresses = json_decode($data['actresses']);
$actressAdvs = json_decode($data['actressAdvs']);
$advs = json_decode($data['advs']);
?>
<div class="content-body">
    <div class="container">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>CIS, <span>Diễn viên</span></h4>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Diễn viên</a>
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
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Các tên khác</th>
                                        <th>Đặc điểm</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($actresses as $row) { ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo $appRootURL ?>/mv/listbyactress/<?php echo $row->{'id'} ?>">
                                                <span class='badge badge-info'><?php echo $row->{'name'} ?></span>
                                            </a>
                                        </td>
                                        <td><?php echo $row->{'otherNames'} ?></td>
                                        <td>
                                            <?php
                                                foreach ($actressAdvs as $actressAdv) {
                                                    if ($actressAdv->{'actressId'} == $row->{'id'}) {
                                                        foreach ($advs as $adv) {
                                                            if ($adv->{'id'} == $actressAdv->{'advId'}) {
                                                                echo "<a target='_blank' href='" . "#" . "'><span class='badge badge-primary'>" . $adv->{'name'} . "</span></a>". " ";
                                                            }
                                                        }
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td><img width="200px" src="<?php echo $appRootURL . $row->{'avatar'} ?>" alt=""></td>
                                        <td>
                                        <div class="btn-group">
                                                <a href="<?php echo $appRootURL ?>/actress/edit/<?php echo $row->{'id'} ?>" type="button" class="btn btn-linkedin"><i class="mdi mdi-grease-pencil"></i></a>
                                                <a href="<?php echo $appRootURL ?>/actress/delete/<?php echo $row->{'id'} ?>" type="button" class="btn btn-google-plus"><i class="mdi mdi-delete"></i></a>
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