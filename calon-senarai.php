<?php

# Memulakan sesi
session_start();

error_reporting(0);

# Memanggil fail header.php, connection.php, dan kawalan-admin.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');

?>

<link rel="stylesheet" href="style_senarai_calon.css">

<div class="candidate-page">

    <div class="candidate-container">

        <!-- HEADER -->
        <div class="page-header">

            <h2>Senarai Calon</h2>

            <p>
                Pengurusan Maklumat Calon Kadet Bomba
            </p>

        </div>

        <!-- TOP BAR -->
        <div class="top-bar">

            <!-- SEARCH -->
            <form action="" method="POST" class="search-form">

                <input 
                    type="text"
                    name="nama_calon"
                    placeholder="Carian calon..."
                >

                <input 
                    type="submit"
                    value="Cari"
                    class="search-btn"
                >

            </form>

            <!-- ACTION -->
            <div class="top-action">

                <a href="calon-daftar.php" class="add-btn">
                    + Daftar Calon Baru
                </a>

                <div class="font-size-box">

                    <?php include('butang-saiz.php'); ?>

                </div>

            </div>

        </div>

        <!-- TABLE -->
        <div class="table-wrapper">

            <table class="candidate-table">

                <tr>

                    <th>ID Calon</th>

                    <th>Nama Calon</th>

                    <th>Gambar</th>

                    <th>Tindakan</th>

                </tr>

<?php

# Syarat tambahan
$tambahan = "";

if(!empty($_POST['nama_calon'])) {

    $tambahan =
    "WHERE nama_calon LIKE '%".$_POST['nama_calon']."%'";
}

# Arahan query
$arahan_papar = "SELECT * FROM calon $tambahan";

# Laksanakan query
$laksana = mysqli_query($condb, $arahan_papar);

# Paparkan data
while($row = mysqli_fetch_array($laksana)) {

    echo "

    <tr>

        <td>
            ".$row['id_calon']."
        </td>

        <td class='candidate-name'>
            ".$row['nama_calon']."
        </td>

        <td>

            <img 
                src='".$row['gambar']."'
                alt='".$row['nama_calon']."'
                class='candidate-img'
            >

        </td>

        <td>

            <div class='action-buttons'>

                <a 
                    href='calon-kemaskini-borang.php?id_calon=".$row['id_calon']."'
                    class='edit-btn'
                >
                    Kemaskini
                </a>

                <a 
                    href='calon-padam.php?id_calon=".$row['id_calon']."'
                    class='delete-btn'
                    onClick=\"return confirm('Anda pasti anda ingin memadam data ini?')\"
                >
                    Hapus
                </a>

            </div>

        </td>

    </tr>

    ";
}

?>

            </table>

        </div>

    </div>

</div>

<?php include('footer.php'); ?>