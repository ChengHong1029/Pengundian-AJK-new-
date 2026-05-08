<?php
session_start();
include('kawalan-admin.php');

if (!empty($_GET['nokp'])) {

    include('connection.php');

    $nokp = $_GET['nokp'];

    // 1. 删投票记录（子表）
    mysqli_query($condb, "DELETE FROM undian WHERE nokp='$nokp'");

    // 2. 再删用户（父表）
    $arahan = "DELETE FROM pengguna WHERE nokp='$nokp'";

    if (mysqli_query($condb, $arahan)) {

        echo "<script>
            alert('Padam data berjaya');
            window.location.href='pengguna-senarai.php';
        </script>";

    } else {

        echo "<script>
            alert('Padam data gagal');
            window.location.href='pengguna-senarai.php';
        </script>";

    }

} else {

    die("<script>
        alert('Ralat! Akses secara terus');
        window.location.href='pengguna-senarai.php';
    </script>");

}
?>