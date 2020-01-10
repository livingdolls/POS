<?php
    session_start();

    if(isset($_POST['Uid']))
    {
        $id     = $_POST['Uid'];
        $qty    = $_POST['Uqty'];
        $diskon = $_POST['Udis'];
        
        $_SESSION['kasir'][$id]['jumlah'] = $qty;
        $_SESSION['kasir'][$id]['diskon'] = $diskon;
    }

    if(isset($_GET['idx']))
    {
        $a = $_GET['idx'];
        unset($_SESSION['kasir'][$a]);
    }
    header("Location:index.php");

?>