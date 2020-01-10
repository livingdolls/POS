<?php
include '../konek.php';
    $id = $_POST['id'];
    $result = array();

    $sql = $konek->query("SELECT * FROM barang WHERE id_barang = $id");

    $fetch = $sql->fetch_assoc();

    $result = $fetch;
    echo json_encode($result);

?>