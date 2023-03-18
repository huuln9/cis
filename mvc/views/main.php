<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>CIS</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $appRootURL ?>/public/home/images/favicon.ico">
    <link href="<?php echo $appRootURL ?>/public/main/css/style.css" rel="stylesheet">
    <link href="<?php echo $appRootURL ?>/public/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="<?php echo $appRootURL ?>/public/main/js/modernizr-3.6.0.min.js"></script>
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
                    <a href="<?php echo $appRootURL ?>/mv/list">
                        <b><img src="<?php echo $appRootURL ?>/public/home/images/logo-2.png" alt=""></b>
                        <span class="brand-title">
                            <img width="50px" src="<?php echo $appRootURL ?>/public/home/images/cis-logo.png" alt="">
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
                    <li class="nav-label">CIS</li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-human-female"></i> <span class="nav-text">Diễn viên</span></a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="<?php echo $appRootURL ?>/actress/list"><i class="mdi mdi-playlist-play"></i> Danh sách</a>
                            </li>
                            <li>
                                <a href="<?php echo $appRootURL ?>/actress/add"><i class="mdi mdi-playlist-plus"></i> Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-film"></i> <span class="nav-text">Mv</span></a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="<?php echo $appRootURL ?>/mv/list"><i class="mdi mdi-playlist-play"></i> Danh sách</a>
                            </li>
                            <li>
                                <a href="<?php echo $appRootURL ?>/mv/add"><i class="mdi mdi-playlist-plus"></i> Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-tag"></i> <span class="nav-text">Thể loại</span></a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="<?php echo $appRootURL ?>/tag/list"><i class="mdi mdi-playlist-play"></i> Danh sách</a>
                            </li>
                            <li>
                                <a href="<?php echo $appRootURL ?>/tag/add"><i class="mdi mdi-playlist-plus"></i> Thêm mới</a>
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
                <p>Copyright &copy; CIS 2023</p>
            </div>
        </div>
        <!-- #/ footer -->
    </div>

    <!-- Common JS -->
    <script src="<?php echo $appRootURL ?>/public/assets/plugins/common/common.min.js"></script>
    <!-- Custom script -->
    <script src="<?php echo $appRootURL ?>/public/main/js/custom.min.js"></script>

    <script src="<?php echo $appRootURL ?>/public/assets/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $appRootURL ?>/public/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo $appRootURL ?>/public/assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

</body>

</html>