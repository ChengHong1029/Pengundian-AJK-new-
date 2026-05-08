<?php
# Memulakan sesi
session_start();

# Memanggil fail header, connection dan kawalan admin
include('header.php');
include('connection.php');
include('kawalan-admin.php');

# Pastikan connection berjaya
if (!isset($condb)) {
    die("Kesalahan sambungan ke pangkalan data.");
}
?>

<link rel="stylesheet" href="style_pengguna_senarai.css">

<div class="user-page">

    <div class="user-container">

        <!-- HEADER -->
        <div class="page-header">

            <h2>Senarai Pengguna</h2>

            <p>Pengurusan pengguna sistem</p>

        </div>

        <!-- TOP BAR -->
        <div class="top-bar">

            <!-- SEARCH -->
            <form action="" method="POST" class="search-form">

                <input 
                    type="text"
                    name="nama"
                    placeholder="Carian nama pengguna..."
                >

                <input 
                    type="submit"
                    value="Cari"
                    class="search-btn"
                >

            </form>

            <!-- ACTION -->
            <div class="top-action">

                <a href="upload.php" class="add-btn">
                    + Muat Naik Pengguna
                </a>

                <div class="font-size-box">

                    <?php include('butang-saiz.php'); ?>

                </div>

            </div>

        </div>

        <!-- TABLE -->
        <div class="table-wrapper">

            <table class="user-table">

                <tr>

                    <th>Nama</th>

                    <th>No KP</th>

                    <th>Katalaluan</th>

                    <th>Tahap</th>

                    <th>Tindakan</th>

                </tr>

<?php

# Syarat carian
$tambahan = "";

if (!empty($_POST['nama'])) {

    $nama = mysqli_real_escape_string($condb, $_POST['nama']);

    $tambahan = " WHERE pengguna.nama LIKE '%$nama%'";
}

# Query
$arahan_papar = "SELECT * FROM pengguna $tambahan";

$laksana = mysqli_query($condb, $arahan_papar);

# Paparan data
while ($m = mysqli_fetch_array($laksana)) {

    echo "

    <tr>

        <td class='name'>
            ".htmlspecialchars($m['nama'])."
        </td>

        <td>
            ".htmlspecialchars($m['nokp'])."
        </td>

        <td>
            ".htmlspecialchars($m['katalaluan'])."
        </td>

        <td>
            <span class='badge'>
                ".htmlspecialchars($m['tahap'])."
            </span>
        </td>

        <td>

            <a 
                class='delete-btn'
                href='pengguna_padam.php?nokp=".urlencode($m['nokp'])."'
                onclick=\"return confirm('Anda pasti anda ingin memadam data ini?')\"
            >
                Hapus
            </a>

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