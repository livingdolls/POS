<?php
include '../../konek.php';
    $id = $_POST['id'];
    $result = array();

    $sql = $konek->query("SELECT * FROM kategori WHERE id_kategori = $id");

    $fetch = $sql->fetch_assoc();

    $result = $fetch;
    echo json_encode($result);

?>