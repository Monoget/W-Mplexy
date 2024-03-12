<?php
session_start();
require_once("../include/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard Admin | MPLEXY</title>
    <meta name="description" content="Some description for the page"/>
    <?php require_once('include/css.php'); ?>
</head>
<body>
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<div id="main-wrapper">
    <div class="nav-header">
        <a href="dashboard" class="brand-logo">
            <img class="logo-abbr" src="public/images/logo_icon.png" alt="">
            <img class="logo-compact" src="public/images/logo_text.png" alt="">
            <img class="brand-title" src="public/images/logo_text.png" alt="">
        </a>
        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="dashboard_bar">
                            Dashboard
                        </div>
                    </div>
                    <?php require_once('include/header.php'); ?>
                </div>
            </nav>
        </div>
    </div>

    <?php require_once('include/navbar.php'); ?>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xxl-4">
                    <div class="widget-stat card bg-info">
                        <div class="card-body p-4">
                            <div class="media">
                                <span class="mr-3">
                                <i class="flaticon-381-heart"></i>
                                </span>
                                <div class="media-body text-white text-right">
                                    <p class="mb-1">Total Contact Data</p>
                                    <h3 class="text-white">
                                        <?php
                                        $row_count = $db_handle->numRows("SELECT * FROM contact order by id desc");
                                        echo $row_count;
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xxl-4">
                    <div class="widget-stat card bg-primary">
                        <div class="card-body p-4">
                            <div class="media">
                                <span class="mr-3">
                                <i class="flaticon-381-user-7"></i>
                                </span>
                                <div class="media-body text-white text-right">
                                    <p class="mb-1">Total Newsletter Subscription</p>
                                    <h3 class="text-white"><?php
                                        $row_count = $db_handle->numRows("SELECT * FROM newsletter order by id desc");
                                        echo $row_count;
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('include/footer.php'); ?>

</div>

<?php require_once('include/js.php'); ?>
</body>
</html>