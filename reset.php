<?php
session_start();

unset($_SESSION['kasir']);
 header("Location:index.php");


?>