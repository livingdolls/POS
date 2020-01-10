<?php
    include '../../konek.php';

    $id = $_POST['id'];
    $sql = $konek->query("SELECT * FROM `admin` WHERE id_admin = $id");

    $fetch = $sql->fetch_assoc();

    $result = $fetch;
    echo json_encode($result);
?>