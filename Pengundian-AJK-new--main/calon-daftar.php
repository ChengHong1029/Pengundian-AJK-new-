<?php
session_start();

include('kawalan-admin.php');
include('connection.php');
include('header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_calon = $_POST['id_calon'];
    $nama = $_POST['nama_calon'];

    // Urus gambar
    $nama_gambar = $_FILES['gambar']['name'];
    $sementara = $_FILES['gambar']['tmp_name'];
    $lokasi = 'gambar/' . basename($nama_gambar);

    if (move_uploaded_file($sementara, $lokasi)) {

        $query = "INSERT INTO calon (id_calon, nama_calon, gambar)
                  VALUES ('$id_calon', '$nama', '$lokasi')";

        if (mysqli_query($condb, $query)) {

            echo "<script>
            alert('Pendaftaran berjaya!');
            window.location.href='calon-senarai.php';
            </script>";

        } else {

            if (mysqli_errno($condb) == 1062) {

                echo "<script>
                alert('ID calon sudah didaftarkan oleh pengguna lain. Sila guna ID lain.');
                </script>";

            } else {

                echo "<script>
                alert('Ralat: " . mysqli_error($condb) . "');
                </script>";
            }
        }

    } else {

        echo "<script>alert('Gagal memuat naik gambar.');</script>";
    }
}
?>

<!DOCTYPE html>

<html>

<head>

    <title>Daftar Calon</title>

    <link rel="stylesheet" href="style_calon_daftar.css">

</head>

<body>

<div class="register-page">

    <div class="register-container">

        <!-- HEADER -->
        <div class="register-header">

            <h2>Daftar Calon</h2>

            <p>Pertandingan Kadet Bomba</p>

        </div>

        <!-- FORM -->
        <form action="" method="POST" enctype="multipart/form-data">

            <!-- ID -->
            <div class="input-group">

                <label>ID Calon</label>

                <input 
                    type="text"
                    name="id_calon"
                    placeholder="Contoh: C01"
                    required
                >

            </div>

            <!-- NAMA -->
            <div class="input-group">

                <label>Nama Calon</label>

                <input 
                    type="text"
                    name="nama_calon"
                    placeholder="Masukkan nama calon"
                    required
                >

            </div>

            <!-- GAMBAR -->
            <div class="input-group">

                <label>Muat Naik Gambar</label>

                <input 
                    type="file"
                    name="gambar"
                    accept="image/*"
                    required
                >

            </div>

            <!-- BUTTON -->
            <input 
                type="submit"
                value="DAFTAR"
                class="submit-btn"
            >

        </form>

    </div>

</div>

</body>

</html>