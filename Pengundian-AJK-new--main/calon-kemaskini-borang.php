<?php
session_start();

include('kawalan-admin.php');
include('connection.php');

// Dapatkan data calon
$id_calon = $_GET['id_calon'];

$result = mysqli_query($condb, "SELECT * FROM calon WHERE id_calon='$id_calon'");

$calon = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>

<html>

<head>

    <title>Kemaskini Calon</title>

    <link rel="stylesheet" href="style_calon_kemaskini.css">

</head>

<body>

<div class="update-page">

    <div class="update-container">

        <!-- HEADER -->
        <div class="update-header">

            <h2>Kemaskini Calon</h2>

            <p>Ubah maklumat calon yang dipilih</p>

        </div>

        <!-- FORM -->
        <form action="calon-kemaskini-proses.php" method="POST">

            <input 
                type="hidden"
                name="id_calon"
                value="<?= $calon['id_calon'] ?>"
            >

            <!-- NAMA -->
            <div class="input-group">

                <label>Nama Calon</label>

                <input 
                    type="text"
                    name="name_calon"
                    value="<?= $calon['nama_calon'] ?>"
                    required
                >

            </div>

            <!-- GAMBAR -->
            <div class="image-section">

                <label>Gambar Semasa</label>

                <div class="image-box">

                    <?php if (!empty($calon['gambar'])): ?>

                        <img 
                            src="<?= $calon['gambar'] ?>"
                            alt="Gambar Calon"
                            class="calon-img"
                        >

                    <?php else: ?>

                        <p>Tiada gambar</p>

                    <?php endif; ?>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="button-group">

                <input 
                    type="submit"
                    value="KEMASKINI"
                    class="update-btn"
                >

                <a href="calon-senarai.php" class="cancel-btn">
                    BATAL
                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>