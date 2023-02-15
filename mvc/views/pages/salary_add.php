<div class="content-body">
    <div class="container">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>Thu nhập, <span>Lương thưởng</span></h4>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Lương thưởng</a>
                    </li>
                    <li class="breadcrumb-item active">Ghi lại</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ghi lại</h4>
                        <div class="basic-form">
                            <form>
                                <div class="form-group">
                                    <input type="number" class="form-control input-default" placeholder="Số tiền">
                                </div>
                                <div class="form-group">
                                    <label>Tháng</label>
                                    <input type="month" value="<?php echo date('Y-m'); ?>" class="form-control input-default">
                                </div>
                                <div class="form-group">
                                    <label>Ngày lãnh</label>
                                    <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control input-default">
                                </div>
                                <button type="button" class="btn btn-rounded btn-success"><span class="btn-icon-left"><i class="mdi mdi-content-save color-success"></i> </span>Lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>