<?php
session_start();
require_once("../include/dbcontroller.php");
$db_handle = new DBController();
if (isset($_POST["submit"])) {
    $email = $db_handle->checkValue($_POST['email']);
    $password = $db_handle->checkValue($_POST['password']);

    $login = $db_handle->numRows("SELECT * FROM admin_login WHERE email='$email' and password='$password'");

    $login_data = $db_handle->runQuery("SELECT * FROM admin_login WHERE email='$email' and password='$password'");

    if($login==1){
        $_SESSION['user_id']=$login_data[0]["id"];
        $_SESSION['name']=$login_data[0]["name"];
        $_SESSION['role']=$login_data[0]["role"];
        $_SESSION['image']=$login_data[0]["image"];

        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='dashboard';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 2;';
                window.location.href='login';
                </script>";
    }
}

if(isset($_SESSION["name"])){
    echo "<script>
                window.location.href='dashboard';
                </script>";
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Admin | MPLEXY</title>
    <meta name="description" content="Some description for the page"/>
    <link rel="icon" type="image/png" href="../images/../images/favicon.ico"/>
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/vendor/toastr/css/toastr.min.css" rel="stylesheet" type="text/css"/>
</head>
<body class="h-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-2">
                                    <img class="brand-title" src="../images/logo-inverse-238x56.png" alt="">
                                </div>
                                <h4 class="text-center mb-4">Sign in your account</h4>
                                <form action="login" method="post">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Email</strong></label>
                                        <input type="email" name="email" class="form-control" placeholder="hello@example.com">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Password</strong></label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox ml-1">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="basic_checkbox_1">
                                                <label class="custom-control-label" for="basic_checkbox_1">Remember my
                                                    preference</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="public/vendor/global/global.min.js" type="text/javascript"></script>
<script src="public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="public/js/custom.min.js" type="text/javascript"></script>
<script src="public/js/deznav-init.js" type="text/javascript"></script>
<script src="public/vendor/toastr/js/toastr.min.js" type="text/javascript"></script>
<script src="public/js/plugins-init/toastr-init.js" type="text/javascript"></script>
</body>
</html>