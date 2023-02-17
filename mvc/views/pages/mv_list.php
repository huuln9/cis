<?php 
$mvs = json_decode($data['mvs']);
$mvActresss = json_decode($data['mvActresss']);
$mvTags = json_decode($data['mvTags']);
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
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh sách</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Ảnh bìa</th>
                                        <th>Link</th>
                                        <th>Diễn viên</th>
                                        <th>Thể loại</th>
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
                                        <td>
                                            <?php
                                            foreach ($mvActresss as $mvActress) {
                                                if ($mvActress->{'mvId'} == $row->{'id'}) {
                                                    foreach ($actresses as $actress) {
                                                        if ($actress->{'id'} == $mvActress->{'actressId'}) {
                                                            echo "<a target='_blank' href='" . "#" . "'>" . $actress->{'name'} . "</a>" . " ";
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            foreach ($mvTags as $mvTag) {
                                                if ($mvTag->{'mvId'} == $row->{'id'}) {
                                                    foreach ($tags as $tag) {
                                                        if ($tag->{'id'} == $mvTag->{'tagId'}) {
                                                            echo "<a target='_blank' href='" . "#" . "'>" . $tag->{'name'} . "</a>". " ";
                                                        }
                                                    }
                                                }
                                            }    
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo $appRootURL ?>/mv/edit/<?php echo $row->{'id'} ?>" type="button" class="btn btn-linkedin"><i class="mdi mdi-grease-pencil"></i></a>
                                                <a href="<?php echo $appRootURL ?>/mv/delete/<?php echo $row->{'id'} ?>" type="button" class="btn btn-youtube"><i class="mdi mdi-delete"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>