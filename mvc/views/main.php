<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>FINANCE</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $appRootURL ?>/public/home/images/favicon.ico">
    <link href="<?php echo $appRootURL ?>/public/main/css/style.css" rel="stylesheet">
</head>

<body class="v-light vertical-nav fix-header fix-sidebar">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper">
        <!-- header -->
        <div class="header">
            <div class="nav-header">
                <div class="brand-logo">
                    <a href="<?php echo $appRootURL ?>/admin">
                        <b><img src="<?php echo $appRootURL ?>/public/home/images/logo-2.png" alt=""></b>
                        <span class="brand-title">
                            <img src="<?php echo $appRootURL ?>/public/home/images/logo-3.png" alt="">
                        </span>
                    </a>
                </div>
                <div class="nav-control">
                    <div class="hamburger"><span class="line"></span> <span class="line"></span> <span class="line"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ header -->
        <!-- sidebar -->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Đầu tư (chứng khoán)</li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-cash"></i> <span class="nav-text">Dòng tiền</span></a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="<?php echo $appRootURL ?>/cashflow/list"><i class="mdi mdi-history"></i> Lịch sử</a>
                            </li>
                            <li>
                                <a href="<?php echo $appRootURL ?>/cashflow/add"><i class="mdi mdi-sync"></i> Nạp - rút</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-certificate"></i> <span class="nav-text">Cổ phiếu</span></a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="<?php echo $appRootURL ?>/stock/list"><i class="mdi mdi-history"></i> Lịch sử</a>
                            </li>
                            <li>
                                <a href="<?php echo $appRootURL ?>/stock/add"><i class="mdi mdi-sync"></i> Mua - bán</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-cash-100"></i> <span class="nav-text">Mức phí giao dịch</span></a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="<?php echo $appRootURL ?>/transfee/list"><i class="mdi mdi-menu"></i> Danh sách</a>
                            </li>
                            <li>
                                <a href="<?php echo $appRootURL ?>/transfee/add"><i class="mdi mdi-playlist-plus"></i> Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-cash-usd"></i> <span class="nav-text">Phí quản lý tài khoản</span></a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="<?php echo $appRootURL ?>/accfee/list"><i class="mdi mdi-history"></i> Lịch sử</a>
                            </li>
                            <li>
                                <a href="<?php echo $appRootURL ?>/accfee/add"><i class="mdi mdi-pen"></i> Ghi lại</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-label">Thu nhập</li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-cash-multiple"></i> <span class="nav-text">Lương thưởng</span></a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="<?php echo $appRootURL ?>/salary/list"><i class="mdi mdi-history"></i> Lịch sử</a>
                            </li>
                            <li>
                                <a href="<?php echo $appRootURL ?>/salary/add"><i class="mdi mdi-pen"></i> Ghi lại</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- #/ nk nav scroll -->
        </div>
        <!-- #/ sidebar -->
        <!-- content body -->
        <?php require_once './mvc/views/pages/' . $data['pages'] . '.php'; ?>
        <!-- #/ content body -->
        <!-- footer -->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; huuln 2022</p>
            </div>
        </div>
        <!-- #/ footer -->
    </div>

    <!-- Common JS -->
    <script src="<?php echo $appRootURL ?>/public/assets/plugins/common/common.min.js"></script>
    <!-- Custom script -->
    <script src="<?php echo $appRootURL ?>/public/main/js/custom.min.js"></script>

</body>

</html>