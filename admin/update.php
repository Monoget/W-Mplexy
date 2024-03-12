<?php
session_start();
require_once("../include/dbcontroller.php");
$db_handle = new DBController();
if (isset($_POST['pass_update'])) {
    $new_pass = $db_handle->checkValue($_POST['new_pass']);
    $cnfrm_pass = $db_handle->checkValue($_POST['cnfrm_pass']);
    $old_pass = $db_handle->checkValue($_POST['old_pass']);

    if ($new_pass == $cnfrm_pass) {
        $update = $db_handle->insertQuery("update admin_login set password='$new_pass' where id='{$_SESSION['user_id']}' and password='$old_pass'");

        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='change-password';
                </script>";
    } else {
        echo "<script>
                document.cookie = 'alert = 2;';
                window.location.href='change-password';
                </script>";
    }
}