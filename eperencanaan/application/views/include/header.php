<?php date_default_timezone_set('asia/makassar'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=base_url("public/bappeda/")?>assets/images/logo_morowali.png">
    <!-- App title -->
    <title>E-Perencannan | Kabupaten Morowali</title>

    <!-- App css -->
    <link href="<?=base_url("public/bappeda/")?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url("public/bappeda/")?>assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url("public/bappeda/")?>assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url("public/bappeda/")?>assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url("public/bappeda/")?>assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url("public/bappeda/")?>assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url("public/bappeda/")?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=base_url("public/bappeda/")?>assets/plugins/switchery/switchery.min.css">

    <!-- DataTables -->
    <link href="<?=base_url("public/bappeda/")?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url("public/bappeda/")?>assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <!-- Sweet Alert -->
    <link href="<?=base_url("public/bappeda/")?>assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="<?=base_url("public/bappeda/")?>assets/js/modernizr.min.js"></script>
    <style type="text/css">
        #datatable thead tr th{
            text-align: center;
            background-color: #188ae2;
            color: #fff;
            vertical-align: middle;
            padding: auto;
        }

        .table2 thead tr th{
            text-align: center;
            background-color: #188ae2;
            color: #fff;
            vertical-align: middle;
            padding: auto;
        }

        #datatable tbody tr td{
            text-align: left;
        }

        #datatable2 tbody tr td{
            text-align: left;
        }

        .table2 tbody tr td{
            text-align: left;
        }
    </style>

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo"><span style="font-size: 20px;">E-<span>Perencanaan</span></span><i class="mdi mdi-layers"></i></a>
                <!-- Image logo -->
                <!--<a href="index.html" class="logo">-->
                    <!--<span>-->
                        <!--<img src="assets/images/logo.png" alt="" height="30">-->
                        <!--</span>-->
                        <!--<i>-->
                            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                            <!--</i>-->
                            <!--</a>-->
                        </div>

                        <!-- Button mobile view to collapse sidebar menu -->
                        <div class="navbar navbar-default" role="navigation">
                            <div class="container">

                                <!-- Navbar-left -->
                                <ul class="nav navbar-nav navbar-left">
                                    <li>
                                        <button class="button-menu-mobile open-left waves-effect">
                                            <i class="mdi mdi-menu"></i>
                                        </button>
                                    </li>
                                    <li class="hidden-xs">

                                    </ul>

                                    <!-- Right(Notification) -->
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="dropdown user-box">
                                            <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                                <img src="<?=base_url("public/bappeda/")?>assets/images/users/avatar.png" alt="user-img" class="img-circle user-img">
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                                <li>
                                                    <h5>Hi, Admin</h5>
                                                </li>
<li><a href="javascript:void(0)" data-toggle="modal" data-target="#pengaturan"><i class="ti-settings m-r-5"></i> Pengaturan</a></li>
                                                <li><a href="javascript:void(0)"><i class="ti-power-off m-r-5"></i> Keluar</a></li>
                                            </ul>
                                        </li>

                                    </ul> <!-- end navbar-right -->

                                </div><!-- end container -->
                            </div><!-- end navbar -->
                        </div>
                        <!-- Top Bar End -->


                        <!-- ========== Left Sidebar Start ========== -->
                        <div class="left side-menu">
                            <div class="sidebar-inner slimscrollleft">

                                <!--- Sidemenu -->
                                <div id="sidebar-menu">
                                    <ul>
                                       <li class="menu-title">Menu </li>

                                    <li>
                                        <a href="index.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span> Beranda </span></a>
                                    </li>

                                    <li class="has_sub">
                                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-arrange-send-backward"></i> <span> Penyusunan Renstra </span> <span class="menu-arrow" style="margin-right: -10px;"></span></a>
                                        <ul class="list-unstyled">
                                            <li><a href="<?=base_url()?>bappeda/renstra">Renstra Kabupaten</a></li>
                                            <li><a href="<?=base_url()?>bappeda/pagu">PAGU</a></li>
                                        </ul>
                                    </li>
                                    <li class="has_sub">
                                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-arrange-send-backward"></i> <span> Penyusunan RKPD </span> <span class="menu-arrow" style="margin-right: -10px;"></span></a>
                                        <ul class="list-unstyled">
                                            <li><a href="<?=base_url()?>rkpd/awal">RKPD Awal</a></li>
                                            <li><a href="<?=base_url()?>rkpd/verifikasi">RKPD Verifikasi</a></li>
                                            <li><a href="<?=base_url()?>rkpd/penetapan">RKPD Penetapan</a></li>
                                            <li><a href="<?=base_url()?>rkpd/perubahan">RKPD Perubahan</a></li>
                                        </ul>
                                    </li>

                                    <li class="has_sub">
                                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-arrange-send-backward"></i> <span> SOTK </span> <span class="menu-arrow" style="margin-right: -10px;"></span></a>
                                        <ul class="list-unstyled">
                                            <li><a href="<?=base_url()?>sotk/urusan">Urusan</a></li>
                                            <li><a href="<?=base_url()?>sotk/fungsi">Fungsi</a></li>
                                            <li><a href="<?=base_url()?>sotk/bidang">Bidang</a></li>
                                            <li><a href="<?=base_url()?>sotk/sub_unit">Sub Unit</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="user.php" class="waves-effect" style="color: #d1e8f9"><i class="mdi mdi-account-multiple"></i><span> Kelola User </span></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Sidebar -->
                            <div class="clearfix"></div>

                            <div class="help-box">
                                <h5 class="text-muted m-t-0"><?= date('d-M-Y'); ?></h5>
                                <p class=""><span class="text-custom">Pukul :</span> <br/> <?= date('H:i:s'); ?></p>
                            </div>

                        </div>
                        <!-- Sidebar -left -->

                    </div>
                    <!-- Left Sidebar End -->



                    <!-- ============================================================== -->
                    <!-- Start right Content here -->
                    <!-- ============================================================== -->
                    <div class="content-page">

                    