<?php
include 'Auth.php';

    unset($_SESSION['status_login']);
    unset($_SESSION['user']);


    header("Location:login.php?pesan=logout");

?>