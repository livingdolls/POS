<?php
session_start();
    if($_SESSION['status_login'] != true)
    {
        header("Location:login.php?pesan=belum_login");
    }
?>