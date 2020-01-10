<?php

    include '../../konek.php';

    $id = $_POST['id'];

    $sql = $konek->query("SELECT * FROM supplier WHERE id_supplier = $id");

    $result = $sql->fetch_assoc();

    echo json_encode($result);

?>