<?php
session_start();

include ("header.php");
include ("connection.php");
?>

<link rel="stylesheet" href="style.css">

<?php

// Query undian mengikut jawatan dengan ORDER BY idjawatan
$query_jawatan = "
SELECT
    j.idjawatan,
    j.nama_jawatan,
    c.id_calon,
    c.nama_calon,
    c.gambar,
    COUNT(u.id_undi) AS jumlah_undian
FROM undian u
JOIN jawatan j ON u.idjawatan = j.idjawatan
JOIN calon c ON u.id_calon = c.id_calon
GROUP BY j.idjawatan, j.nama_jawatan, c.id_calon, c.nama_calon, c.gambar
ORDER BY j.idjawatan, jumlah_undian DESC";

$result_jawatan = mysqli_query($condb, $query_jawatan);

if (!$result_jawatan) {
    die("SQL Error: " . mysqli_error($condb));
}

// Susun data undian mengikut idjawatan
$undian_jawatan = [];

while ($row = mysqli_fetch_assoc($result_jawatan)) {

    $idjawatan = $row['idjawatan'];

    if (!isset($undian_jawatan[$idjawatan])) {

        $undian_jawatan[$idjawatan] = [
            'nama_jawatan' => $row['nama_jawatan'],
            'calon' => []
        ];
    }

    $undian_jawatan[$idjawatan]['calon'][] = $row;
}

// Urutkan array berdasarkan idjawatan
ksort($undian_jawatan);

?>

<!-- =========================
     TOP SECTION
========================= -->

<table class="top-section">

    <tr>

        <td class="banner-box" align="center">

            <img src="banner.jpg" class="banner-img">

        </td>

        <td class="login-box" align="center">

            <h3>Daftar Sebagai Pengundi</h3>

            <h3>Klik Pautan Dibawah</h3>

            <a href="login-borang.php">Log Masuk</a>

            <br>

            <a href="signup.php">Daftar Pengguna Baharu</a>

        </td>

    </tr>

</table>

<!-- =========================
     PAPARAN UNDIAN
========================= -->

<div class="vote-container">

    <h2 class="vote-title">
        UNDIAN SEMASA MENGIKUT JAWATAN
    </h2>

    <?php foreach ($undian_jawatan as $idjawatan => $data_jawatan): ?>

        <div class="jawatan-card">

            <h3 class="jawatan-title">

                <?= $data_jawatan['nama_jawatan'] ?>

            </h3>

            <div class="calon-wrapper">

                <?php foreach ($data_jawatan['calon'] as $undian): ?>

                    <div class="calon-card">

                        <div class="calon-info">

                            <img 
                                src="<?= $undian['gambar'] ?>"
                                alt="<?= $undian['nama_calon'] ?>"
                                class="calon-img"
                            >

                            <div>

                                <h4 class="calon-name">

                                    <?= $undian['nama_calon'] ?>

                                </h4>

                                <p class="vote-count">

                                    Undian:
                                    <?= $undian['jumlah_undian'] ?>

                                </p>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    <?php endforeach; ?>

</div>

<?php include ("footer.php"); ?>